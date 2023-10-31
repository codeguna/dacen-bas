<?php

namespace App\Http\Controllers;

use App\Models\AttendancesRequest;
use Illuminate\Http\Request;

/**
 * Class AttendancesRequestController
 * @package App\Http\Controllers
 */
class AttendancesRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendancesRequests = AttendancesRequest::paginate();

        return view('attendances-request.index', compact('attendancesRequests'))
            ->with('i', (request()->input('page', 1) - 1) * $attendancesRequests->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attendancesRequest = new AttendancesRequest();
        return view('attendances-request.create', compact('attendancesRequest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(AttendancesRequest::$rules);

        $attendancesRequest = AttendancesRequest::create($request->all());

        return redirect()->route('attendances-requests.index')
            ->with('success', 'AttendancesRequest created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendancesRequest = AttendancesRequest::find($id);

        return view('attendances-request.show', compact('attendancesRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attendancesRequest = AttendancesRequest::find($id);

        return view('attendances-request.edit', compact('attendancesRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AttendancesRequest $attendancesRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttendancesRequest $attendancesRequest)
    {
        request()->validate(AttendancesRequest::$rules);

        $attendancesRequest->update($request->all());

        return redirect()->route('attendances-requests.index')
            ->with('success', 'AttendancesRequest updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $attendancesRequest = AttendancesRequest::find($id)->delete();

        return redirect()->route('attendances-requests.index')
            ->with('success', 'AttendancesRequest deleted successfully');
    }    
}