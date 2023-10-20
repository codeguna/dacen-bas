<?php

namespace App\Http\Controllers;

use App\Models\ScanLog;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScanlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $today = now()->format('Y-m-d'); // Get today's date in 'Y-m-d' format
    $scanLogs = ScanLog::whereDate('scan', $today)->orderBy('scan', 'ASC')->paginate();

    return view('scan-log.index', compact('scanLogs'))
        ->with('i', (request()->input('page', 1) - 1) * $scanLogs->perPage());
}

public function result(){
    
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // app/Http/Controllers/ScanLogController.php
    public function store(Request $request)
    {
        $data = $request->all();

        // Validasi data jika diperlukan
        $validatedData = $request->validate([
            'pin' => 'required|integer',
            'scan' => 'required|date',
            'verify' => 'required|boolean',
            'status_scan' => 'required|boolean',
            'ip_scan' => 'required|string',
        ]);

        // Simpan data ke dalam tabel
        $scanLog = ScanLog::create($validatedData);

        return response()->json(['message' => 'Data berhasil disimpan'], 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function synchronize(Request $request)
    {
        // return 'masuk';
        $rules = [
            'date' => 'required|string',
        ];

        $data = $request->all();
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        $end_date = $request->date;
        $start_date = $request->date;

        $apitoken = env('FINGERSPOT_API_TOKEN');
        $cloudid = env('FINGERSPOT_CLOUD_ID');
        $url = env('FINGERSPOT_URL');
        $dataBody = array(
            'trans_id' => 1,
            'cloud_id' => $cloudid,
            'start_date' => $end_date,
            'end_date' =>  $start_date,
        );

        $client = new Client(['verify' => false]);

        $r = $client->request('POST', $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $apitoken,
            ],
            'body' => json_encode($dataBody),
        ]);
        $a = 0;
        if ($r->getStatusCode() == 200) {

            $response = $r->getBody()->getContents();
            $scans = json_decode($response, true);

            if ($start_date === $end_date) {
                foreach ($scans['data'] as $value) {

                    $scans = ScanLog::where('pin', $value['pin'])->where('scan', $value['scan_date'])->get();

                    $pin = 'lpkia-' . $value['pin'];
                    $myPin = explode('-', $pin);
                    if ($myPin[1] === "050") {
                        $realPin = "1" . $myPin[1];
                    } else {
                        $realPin = $value['pin'];
                    }

                    if ($scans->count() === 0) {
                        $a += 1;
                        $attlogData = [
                            'pin' => $realPin,
                            'scan' => $value['scan_date'],
                            'verify' => $value['verify'],
                            'status_scan' => $value['status_scan'],
                            'ip_scan' => $request->ip() ?? '-',
                        ];
                        ScanLog::create($attlogData);
                    }
                }
            }
        }

        return response()->json(['status' => 'success', 'data' => 'data berhasil di simpan : ' . $a]);
    }
}