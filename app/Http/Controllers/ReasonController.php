<?php

namespace App\Http\Controllers;

use App\Models\Reason;
use Illuminate\Http\Request;

/**
 * Class ReasonController
 * @package App\Http\Controllers
 */
class ReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reasons = Reason::orderBy('name','ASC')->paginate();

        return view('reason.index', compact('reasons'))
            ->with('i', (request()->input('page', 1) - 1) * $reasons->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reason = new Reason();
        return view('reason.create', compact('reason'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Reason::$rules);

        $reason = Reason::create($request->all());

        return redirect()->route('admin.reasons.index')
            ->with('success', 'Reason created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reason = Reason::find($id);

        return view('reason.show', compact('reason'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reason = Reason::find($id);

        return view('reason.edit', compact('reason'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Reason $reason
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reason $reason)
    {
        request()->validate(Reason::$rules);

        $reason->update($request->all());

        return redirect()->route('admin.reasons.index')
            ->with('success', 'Reason updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $reason = Reason::find($id)->delete();

        return redirect()->route('admin.reasons.index')
            ->with('success', 'Reason deleted successfully');
    }
}
