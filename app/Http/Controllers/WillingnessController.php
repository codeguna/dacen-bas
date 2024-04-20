<?php

namespace App\Http\Controllers;

use App\Models\Willingness;
use App\User;
use Illuminate\Http\Request;

/**
 * Class WillingnessController
 * @package App\Http\Controllers
 */
class WillingnessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users          = User::where('pin', '<>', null)->orderBy('name', 'ASC')->get();

        return view('willingness.index', compact('users'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $willingness = new Willingness();
        return view('willingness.create', compact('willingness'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Willingness::$rules);

        $willingness = Willingness::create($request->all());

        return redirect()->route('admin.willingnesses.index')
            ->with('success', 'Willingness created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($pin)
    {
        $willingnesses = Willingness::where('pin', $pin)->paginate(6);
        $willingnessID = Willingness::select('pin')->where('pin', $pin)->first();

        return view('willingness.show', compact('willingnesses', 'willingnessID'))->with('i');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $willingness = Willingness::find($id);

        return view('willingness.edit', compact('willingness'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Willingness $willingness
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Willingness $willingness)
    {
        //request()->validate(Willingness::$rules);

        $willingness->update($request->all());

        return redirect()->back()
            ->with('success', 'Willingness updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($pin)
    {
        $willingness = Willingness::where('pin', $pin)->delete();

        return redirect()->route('admin.willingnesses.index')
            ->with('success', 'Willingness deleted successfully');
    }

    public function bulkUpdate(Request $request)
    {
        $data = $request->all();
        // Loop melalui data yang diterima dan lakukan pembaruan
        foreach ($data['id'] as $index => $id) {
            $willingness = Willingness::find($id);
            if ($willingness) {
                $willingness->day_code = $data['day_code'][$index];
                $willingness->start_date = $data['start_date'][$index];
                $willingness->end_date = $data['end_date'][$index];
                $willingness->time_of_entry = $data['time_of_entry'][$index];
                $willingness->time_of_return = $data['time_of_return'][$index];
                $willingness->save();
            }
        }

        return redirect()->back()
            ->with('success', 'Willingness updated successfully');
    }
}
