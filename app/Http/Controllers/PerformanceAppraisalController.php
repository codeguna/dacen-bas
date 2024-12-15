<?php

namespace App\Http\Controllers;

use App\Models\Departmen;
use App\Models\PerformanceAppraisal;
use App\User;
use Illuminate\Http\Request;

/**
 * Class PerformanceAppraisalController
 * @package App\Http\Controllers
 */
class PerformanceAppraisalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $performanceAppraisals = PerformanceAppraisal::paginate();

        return view('performance-appraisal.index', compact('performanceAppraisals'))
            ->with('i', (request()->input('page', 1) - 1) * $performanceAppraisals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $performanceAppraisal = new PerformanceAppraisal();
        $users = User::where('pin', '<>', NULL)->orderBy('name', 'ASC')->pluck('pin', 'name');

        return view('performance-appraisal.create', compact('performanceAppraisal', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        $period         = $data["period"];
        $year           = $data["year"];
        $pin            = $data["pin"];
        $late_total     = $data["late_total"];
        $pure_pa        = $data["pure_pa"];
        $contribution   = $data["contribution"];
        $note           = $data["note"];

        //request()->validate(PerformanceAppraisal::$rules);

        //PA
        if ($pin) {
            foreach ($pin  as $key => $value) {
                $performanceAppraisal               = new PerformanceAppraisal();
                $performanceAppraisal->period       = $period;
                $performanceAppraisal->year         = $year;
                $performanceAppraisal->pin          = $pin[$key];
                $performanceAppraisal->late_total   = $late_total[$key];
                $performanceAppraisal->pure_pa      = $pure_pa[$key];
                $performanceAppraisal->contribution = $contribution[$key];
                $performanceAppraisal->note         = $note[$key];
                $performanceAppraisal->created_at   = now();
                $performanceAppraisal->save();
            }
        }

        return redirect()->back()->with('success', 'Berhasil menambah PA pada periode ini!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $performanceAppraisal = PerformanceAppraisal::find($id);

        return view('performance-appraisal.show', compact('performanceAppraisal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $performanceAppraisal = PerformanceAppraisal::find($id);
        $users = User::where('pin', '<>', NULL)->orderBy('name', 'ASC')->pluck('pin', 'name');

        return view('performance-appraisal.edit', compact('performanceAppraisal', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PerformanceAppraisal $performanceAppraisal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerformanceAppraisal $performanceAppraisal)
    {
        //request()->validate(PerformanceAppraisal::$rules);

        $performanceAppraisal->update($request->all());

        return redirect()->route('admin.performance-appraisals.all-pa')
            ->with('success', 'Berhasil Perbarui data PA');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $performanceAppraisal = PerformanceAppraisal::find($id)->delete();

        return redirect()->route('admin.performance-appraisals.all-pa')
            ->with('success', 'Berhasil Hapus Data PA!');
    }

    public function selectPeriod(Request $request)
    {
        $year           = $request->year;
        $period         = $request->period;
        $department     = $request->department;
        $pin            = $request->pin;

        $departments    = Departmen::orderBy('name', 'ASC')->pluck('id', 'name');
        $users          = User::where('pin','<>', null)->orderBy('name', 'ASC')->pluck('pin', 'name');

        if ($department && $year) {
            $performanceAppraisalsDepartments = User::where('department_id', $department)->orderBy('name', 'ASC')->get();
            $performanceAppraisalsAll = [];
            $performanceAppraisalsPersons = [];
        } elseif ($year && $period) {
            $performanceAppraisalsAll = PerformanceAppraisal::where('period', $period)
                ->where('year', $year)->get();
            $performanceAppraisalsDepartments = [];
            $performanceAppraisalsPersons = [];
        } elseif ($pin && $year) {
            $performanceAppraisalsPersons = PerformanceAppraisal::where('pin', $pin)
                ->where('year', $year)->orderBy('period','ASC')->get();
            $performanceAppraisalsDepartments = [];
            $performanceAppraisalsAll = [];
        } else {
            $performanceAppraisalsDepartments = [];
            $performanceAppraisalsAll = [];
            $performanceAppraisalsPersons = [];
        }

        return view('performance-appraisal.select-period', compact('users', 'year', 'performanceAppraisalsPersons', 'performanceAppraisalsDepartments', 'performanceAppraisalsAll', 'departments'));
    }


    public function destroyBulk(Request $request)
    {
        $year = $request->year;
        $period = $request->period;

        $deletedRows = PerformanceAppraisal::where('period', '=', $period)->where('year', '=', $year)->delete();

        if ($deletedRows > 0) {
            return redirect()->back()->with('success', 'Berhasil hapus PA pada periode ini!');
        } else {
            return redirect()->back()->with('error', 'Tidak ada PA yang ditemukan untuk periode ini.');
        }
    }

    public function allPa()
    {
        $performanceAppraisals = PerformanceAppraisal::whereHas('user', function ($query) {
            $query->orderBy('name', 'ASC');
        })->orderBy('created_at', 'DESC')->get();

        return view('performance-appraisal.all-pa', compact('performanceAppraisals'))->with('i');
    }
}
