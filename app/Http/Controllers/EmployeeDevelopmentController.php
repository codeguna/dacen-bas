<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDevelopment;
use App\Models\EmployeeDevelopmentMember;
use App\Models\EventType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

/**
 * Class EmployeeDevelopmentController
 * @package App\Http\Controllers
 */
class EmployeeDevelopmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getID                  = Auth::user()->id;
        $getDEPT                = Auth::user()->department_id;
        $eventTypes             = EventType::orderBy('name','ASC')->pluck('id','name');

        $employeeDevelopments   = EmployeeDevelopment::whereHas('employeeDevelopmentMembers', function ($query) use ($getID, $getDEPT) {
            $query->where('user_id', $getID)->whereHas('user', function ($query) use ($getDEPT) {
                $query->where('department_id', $getDEPT);
            });
        })->get();

        return view('employee-development.index', compact('employeeDevelopments','eventTypes'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employeeDevelopment = new EmployeeDevelopment();
        return view('employee-development.create', compact('employeeDevelopment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EmployeeDevelopment::$rules);
        $validator = Validator::make($request->all(), EmployeeDevelopmentMember::$rules);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Periksa kembali format file anda (.pdf, .jpg, .jpeg) dan pastikan file tidak melebihi 2MB');
        }
        //UPLOAD FILE
        $id_card_file   = $request->file('certificate_attachment');
        $name_file = time() . "_" . $id_card_file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_pengembangan';
        $id_card_file->move($tujuan_upload, $name_file);
        //END UPLOAD FILE

        $event_name         = $request->event_name;
        $speaker            = $request->speaker;
        $event_organizer    = $request->event_organizer;
        $place              = $request->place;
        $price              = $request->price;
        $event_type_id      = $request->event_type_id;
        $start_date         = $request->start_date;
        $end_date           = $request->end_date;

        $employeeDevelopment  = EmployeeDevelopment::create([
            'event_name'        => $event_name,
            'speaker'           => $speaker,
            'event_organizer'   => $event_organizer,
            'place'             => $place,
            'price'             => $price,
            'event_type_id'     => $event_type_id,
            'start_date'        => $start_date,
            'end_date'          => $end_date,
            'is_approved'       => 0,
            'created_at'        => now()
        ]);

        $employee_developments_id   = $employeeDevelopment->id;
        $user_id                    = Auth::user()->id;

        $employeeDevelopmentMember      = EmployeeDevelopmentMember::create([
            'employee_developments_id'  => $employee_developments_id,
            'user_id'                   => $user_id,
            'certificate_attachment'    => $name_file,


        ]);
        
        return redirect()->route('admin.employee-developments.index')
            ->with('success', 'Behasil Menambahkan Data Pengembangan Baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employeeDevelopment = EmployeeDevelopment::find($id);

        return view('employee-development.show', compact('employeeDevelopment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeeDevelopment = EmployeeDevelopment::find($id);

        return view('employee-development.edit', compact('employeeDevelopment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EmployeeDevelopment $employeeDevelopment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeDevelopment $employeeDevelopment)
    {
        request()->validate(EmployeeDevelopment::$rules);

        $employeeDevelopment->update($request->all());

        return redirect()->route('admin.employee-developments.index')
            ->with('success', 'EmployeeDevelopment updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employeeDevelopments       = EmployeeDevelopment::find($id);
        $employeeDevelopmentMember  = EmployeeDevelopmentMember::select('certificate_attachment')->where('employee_developments_id', $employeeDevelopments->id)->first();

        $file = public_path('data_pengembangan/' . $employeeDevelopmentMember->certificate_attachment);
        $img = File::delete($file);

        $employeeDevelopments = EmployeeDevelopment::find($id)->delete();

        return redirect()->route('admin.employee-developments.index')
            ->with('success', 'EmployeeDevelopment deleted successfully');
    }
}
