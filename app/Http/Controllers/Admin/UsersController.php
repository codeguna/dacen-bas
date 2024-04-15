<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        $user = User::create($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, User $user)
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }

        $user->update($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }

        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        User::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

    public function usersPin()
    {
        $users  = User::orderBy('name', 'ASC')->get();

        return view('admin.users.view-users-pin', compact('users'))->with('i');
    }
    public function setPin($id)
    {

        $user = User::find($id);

        return view('admin.users.set-users-pin', compact('user'));
    }
    public function setBirthday()
    {

        return view('admin.users.set-users-birthday');
    }

    public function updateBirthday(Request $request)
    {
        $birthday   = $request->birthday;
        $id         = Auth::User()->id;

        $request->validate([
            'birthday' => 'required',
        ]);

        $users              = User::find($id);
        $users->update([
            'birthday'       => $birthday,
        ]);
        return redirect()->route('admin.scan-log.my-attendances')->with('success', 'Berhasil memperbarui Tanggal Lahir Pengguna.');
    }
    public function updatePIN(Request $request, $id)
    {
        $pin                = $request->pin;

        $request->validate([
            'pin' => 'required|unique:users,pin,',
        ]);

        $users              = User::find($id);
        $users->update([
            'pin'       => $pin,
        ]);
        return redirect()->route('admin.user.pin')->with('success', 'Berhasil memperbarui PIN Pengguna.');
    }

    public function selectPeriod()
    {
        return view('admin.users.select-period');
    }

    public function resultBirthday(Request $request)
    {
        $start_date = $request->start_date;
        $end_date   = $request->end_date;

        $startMonth = Carbon::parse($start_date)->format('m');
        $endMonth = Carbon::parse($end_date)->format('m');

        $users      = User::select('name', 'birthday')
            ->where('birthday', '<>', NULL)
            ->whereMonth('birthday', '>=', $startMonth)
            ->whereMonth('birthday', '<=', $endMonth)
            ->orderBy('birthday', 'ASC')
            ->get();

        return view('admin.users.result-birthday', compact('start_date', 'end_date', 'users'))->with('i');
    }

    public function resultBirthdayFilter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date   = $request->end_date;

        $startMonth = Carbon::parse($start_date)->format('m');
        $endMonth = Carbon::parse($end_date)->format('m');

        $users      = User::select('name', 'birthday')
            ->where('birthday', '<>', NULL)
            ->whereMonth('birthday', '>=', $startMonth)
            ->whereMonth('birthday', '<=', $endMonth)
            ->orderByRaw("MONTH(birthday), DAY(birthday)")
            ->get();

        return view('admin.users.result-birthday', compact('start_date', 'end_date', 'users'))->with('i');
    }

    public function updatePhoto(Request $request)
    {
        $validator = Validator::make($request->all(), User::$rules);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Periksa kembali format file anda (.jpg, .jpeg) dan pastikan file tidak melebihi 1MB');
        }

        $id             = Auth::user()->id;
        $photo_file     = $request->file('photo');
        $user_id        = $id;

        $name_file = time() . "_" . $photo_file->getClientOriginalName();
        $tujuan_upload = 'data_photo_profil';
        $photo_file->move($tujuan_upload, $name_file); // Save the compressed image

        $user = User::find($user_id);
        // Update the photo attribute
        $user->photo = $name_file;
        // Save the changes
        $user->save();

        return redirect()->back()
            ->with('success', 'Berhasil menambahkan data Pengajuan, silahkan menunggu untuk persetujuan dari BAS.');
    }
}
