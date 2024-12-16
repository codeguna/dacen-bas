<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use Illuminate\Http\Request;

/**
 * Class EventTypeController
 * @package App\Http\Controllers
 */
class EventTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventTypes = EventType::paginate();

        return view('event-type.index', compact('eventTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $eventTypes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventType = new EventType();
        return view('event-type.create', compact('eventType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EventType::$rules);

        $eventType = EventType::create($request->all());

        return redirect()->route('event-types.index')
            ->with('success', 'EventType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventType = EventType::find($id);

        return view('event-type.show', compact('eventType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventType = EventType::find($id);

        return view('event-type.edit', compact('eventType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EventType $eventType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventType $eventType)
    {
        request()->validate(EventType::$rules);

        $eventType->update($request->all());

        return redirect()->route('event-types.index')
            ->with('success', 'EventType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $eventType = EventType::find($id)->delete();

        return redirect()->route('event-types.index')
            ->with('success', 'EventType deleted successfully');
    }
}
