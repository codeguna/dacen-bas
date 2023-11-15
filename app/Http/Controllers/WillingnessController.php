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
        $users = User::whereNotNull('pin')->get();

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
    public function show($id)
    {
        $willingness = Willingness::find($id);

        return view('willingness.show', compact('willingness'));
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
        request()->validate(Willingness::$rules);

        $willingness->update($request->all());

        return redirect()->route('admin.willingnesses.index')
            ->with('success', 'Willingness updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $willingness = Willingness::find($id)->delete();

        return redirect()->route('admin.willingnesses.index')
            ->with('success', 'Willingness deleted successfully');
    }

    public function setTime($id)
    {
        $user_id = $id;
        return view('willingness.create', compact('user_id'));
    }

    public function storeTime(Request $request)
    {            
        request()->validate(Willingness::$rules); 

        // Extract data from the request      
        $types = $request->type;
        $daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        
        // Create Willingness instances based on the number of types
        foreach ($types as $index => $type) {
            $willingnessData = [
                'user_id' => $request->user_id,
                'valid_start' => $request->valid_start,
                'valid_end' => $request->valid_end,
                'type' => $type,
            ];
            
        // Assign each day of the week for the Willingness instance
            foreach ($daysOfWeek as $day) {
                $willingnessData[$day] = $request->$day[$index];
            }
        
            Willingness::create($willingnessData);
        }

        return redirect()->route('admin.willingnesses.index')
            ->with('success', 'Willingness created successfully.'); 
    }
}