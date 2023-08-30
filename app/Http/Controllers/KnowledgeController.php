<?php

namespace App\Http\Controllers;

use App\Models\Knowledge;
use Illuminate\Http\Request;

/**
 * Class KnowledgeController
 * @package App\Http\Controllers
 */
class KnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knowledges = Knowledge::paginate();

        return view('knowledge.index', compact('knowledges'))
            ->with('i', (request()->input('page', 1) - 1) * $knowledges->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $knowledge = new Knowledge();
        return view('knowledge.create', compact('knowledge'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Knowledge::$rules);

        $knowledge = Knowledge::create($request->all());

        return redirect()->route('admin.knowledges.index')
            ->with('success', 'Knowledge created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $knowledge = Knowledge::find($id);

        return view('knowledge.show', compact('knowledge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $knowledge = Knowledge::find($id);

        return view('knowledge.edit', compact('knowledge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Knowledge $knowledge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Knowledge $knowledge)
    {
        request()->validate(Knowledge::$rules);

        $knowledge->update($request->all());

        return redirect()->route('admin.knowledges.index')
            ->with('success', 'Knowledge updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $knowledge = Knowledge::find($id)->delete();

        return redirect()->route('admin.knowledges.index')
            ->with('success', 'Knowledge deleted successfully');
    }
}