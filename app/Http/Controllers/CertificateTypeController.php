<?php

namespace App\Http\Controllers;

use App\Models\CertificateType;
use Illuminate\Http\Request;

/**
 * Class CertificateTypeController
 * @package App\Http\Controllers
 */
class CertificateTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificateTypes = CertificateType::paginate();

        return view('certificate-type.index', compact('certificateTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $certificateTypes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $certificateType = new CertificateType();
        return view('certificate-type.create', compact('certificateType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CertificateType::$rules);

        $certificateType = CertificateType::create($request->all());

        return redirect()->route('admin.certificate-types.index')
            ->with('success', 'CertificateType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $certificateType = CertificateType::find($id);

        return view('certificate-type.show', compact('certificateType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certificateType = CertificateType::find($id);

        return view('certificate-type.edit', compact('certificateType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CertificateType $certificateType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CertificateType $certificateType)
    {
        request()->validate(CertificateType::$rules);

        $certificateType->update($request->all());

        return redirect()->route('admin.certificate-types.index')
            ->with('success', 'CertificateType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $certificateType = CertificateType::find($id)->delete();

        return redirect()->route('admin.certificate-types.index')
            ->with('success', 'CertificateType deleted successfully');
    }
}