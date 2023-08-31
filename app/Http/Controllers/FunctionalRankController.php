<?php

namespace App\Http\Controllers;

use App\Models\FunctionalRank;
use Illuminate\Http\Request;

/**
 * Class FunctionalRankController
 * @package App\Http\Controllers
 */
class FunctionalRankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $functionalRanks = FunctionalRank::orderBy('name','ASC')->paginate();

        return view('functional-rank.index', compact('functionalRanks'))
            ->with('i', (request()->input('page', 1) - 1) * $functionalRanks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $functionalRank = new FunctionalRank();
        return view('functional-rank.create', compact('functionalRank'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(FunctionalRank::$rules);

        $functionalRank = FunctionalRank::create($request->all());

        return redirect()->route('admin.functional-ranks.index')
            ->with('success', 'FunctionalRank created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $functionalRank = FunctionalRank::find($id);

        return view('functional-rank.show', compact('functionalRank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $functionalRank = FunctionalRank::find($id);

        return view('functional-rank.edit', compact('functionalRank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  FunctionalRank $functionalRank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FunctionalRank $functionalRank)
    {
        request()->validate(FunctionalRank::$rules);

        $functionalRank->update($request->all());

        return redirect()->route('admin.functional-ranks.index')
            ->with('success', 'FunctionalRank updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $functionalRank = FunctionalRank::find($id)->delete();

        return redirect()->route('admin.functional-ranks.index')
            ->with('success', 'FunctionalRank deleted successfully');
    }
}