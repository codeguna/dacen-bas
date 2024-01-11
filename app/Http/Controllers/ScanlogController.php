<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\AttendancesRequest;
use App\Models\ScanLog;
use App\Models\ScanLogsExtra;
use App\Models\Willingness;
use App\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GeoIP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;

class ScanlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('bas_menu')) {
            return abort(401);
        }
        $today = now()->format('Y-m-d'); // Get today's date in 'Y-m-d' format
        $scanLogs = ScanLog::whereDate('scan', $today)->orderBy('scan', 'DESC')->get();

        return view('scan-log.index', compact('scanLogs'))
            ->with('i');
    }

    public function filterDate(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $scanLogs = ScanLog::whereDate('scan', '>=', $start_date)
            ->whereDate('scan', '<=', $end_date)
            ->orderBy('scan', 'ASC')
            ->get();

        return view('scan-log.index', compact('scanLogs'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        $pin_pengguna = auth()->user()->pin;
        $tanggal_hari_ini = Carbon::now()->toDateString();

        if ($pin_pengguna === null) {
            return redirect()->route('admin.myprofile')->with('warning','Silahkan hubungi Admin/BAS untuk melakukan input PIN');
        }
        // Menggunakan Eloquent untuk mengambil data scan_logs
        $scan_logs = ScanLog::where('pin', $pin_pengguna)
            ->whereDate('scan', $tanggal_hari_ini)
            ->get();
        // return $scan_logs;
        return view('scan-log.presensiUser', compact('scan_logs'));
    }


    public function presensi()
    {
        $pin_pengguna = auth()->user()->pin;
        $tanggal_hari_ini = Carbon::now()->toDateString();
        // $jam_sekarang = Carbon::now()->format('H:i:s');

        // Mendefinisikan rentang waktu untuk jam 11:00 sampai 12:00
        $startTime_11 = '11:00:00';
        $endTime_12 = '12:00:00';
        $startTime_13 = '13:00:00';
        $endTime_14 = '14:00:00';

        $now = Carbon::now();
        $startTime1 = Carbon::today()->setHour(11);
        $endTime1 = Carbon::today()->setHour(12);
        $startTime2 = Carbon::today()->setHour(13);
        $endTime2 = Carbon::today()->setHour(14);
        $hour = $now->hour;

        if (!($now->between($startTime1, $endTime1) || $now->between($startTime2, $endTime2))) {
            return redirect()->back()->with('error', 'Presensi hanya diperbolehkan antara jam 11:00 - 12:00 atau jam 13:00 - 14:00.');
        }

        // Menggunakan Eloquent Query Builder untuk mencari data
        $scanLogs_11 = ScanLog::where('pin', $pin_pengguna)->whereDate('scan', $tanggal_hari_ini)
            ->whereTime('scan', '>=', $startTime_11)
            ->whereTime('scan', '<=', $endTime_12)
            ->first();

        $scanLogs_13 = ScanLog::where('pin', $pin_pengguna)->whereDate('scan', $tanggal_hari_ini)
            ->whereTime('scan', '>=', $startTime_13)
            ->whereTime('scan', '<=', $endTime_14)
            ->first();

        if ($hour <= 12) {
            if ($scanLogs_11) {
                return redirect()->back()->with('error', 'Anda sudah melakukan scan pada periode ' . $scanLogs_11->scan);
            }
        } elseif ($hour > 12 || $hour < 14) {
            if ($scanLogs_13) {
                return redirect()->back()->with('error', 'Anda sudah melakukan scan pada periode ' . $scanLogs_13->scan);
            }
        }

        if (!$pin_pengguna) {
            return redirect()->back()->with('error', 'Anda Tidak memiliki PIN ');
        }

        $userIP = request()->ip(); // Mendapatkan alamat IP 
        $response = Http::get("https://ipinfo.io/{$userIP}/json");
        $data = $response->json();

        $org = $data['org'];
        // $org = 'BIZNET';

        if (stristr($org, 'BIZNET') !== false) {
            ScanLog::create([
                'pin' => auth()->user()->pin, // Ganti dengan cara yang sesuai untuk mendapatkan PIN pengguna yang login
                'scan' => now(), // Tanggal dan waktu saat ini
                'verify' => true, // Contoh nilai verifikasi
                'status_scan' => true, // Contoh status scan
                'ip_scan' => $userIP, // Alamat IP pengguna yang melakukan presensi
            ]);
            return redirect()->route('admin.scan-log.my-attendances')->with('success', 'Presensi berhasil.');
        } else {
            return redirect()->back()->with('error', 'Anda tidak diizinkan untuk melakukan presensi dari alamat IP ini.');
        }
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
                            'ip_scan' => '3.1.174.198',
                        ];
                        ScanLog::create($attlogData);
                    }
                }
            }
        }

        return response()->json(['status' => 'success', 'data' => 'data berhasil di simpan : ' . $a]);
    }

    public function myAttendances(){

        $pin = Auth::user()->pin;
        // Hitung startDate (tanggal 26 bulan lalu)
        $today = Carbon::now();
        // Peroleh tanggal 26 bulan lalu
        $startDate = Carbon::now()->subMonth()->startOfMonth()->addDays(25);

        // Peroleh tanggal 25 bulan ini jika bulan ini memiliki kurang dari 25 hari, jika tidak gunakan hari terakhir dari bulan ini
        $currentDay = Carbon::now()->day;
        $endDateDay = $currentDay >= 26 ? 25 : min($currentDay, 25);

        // Periksa apakah bulan lalu memiliki 31 hari
        $lastMonthDays = Carbon::now()->subMonth()->endOfMonth()->day;
        $endDateDay = $lastMonthDays == 31 ? 26 : $endDateDay;

        $endDate = Carbon::now()->startOfMonth()->addDays($endDateDay - 1);
        
        //$today  = '2023/10/21';
        $user = Auth::user(); // Assuming you are using Laravel's built-in authentication
        $id = $user->pin;
        $checkWillingness = Willingness::where('pin',$id)->first();

        if ($user->pin === null || empty($checkWillingness)) {
            return redirect()->route('admin.myprofile')->with('warning','Silahkan hubungi Admin/BAS untuk melakukan input PIN atau Set Jam Kesediaan');
        }
        //Kesediaan
        // $getWillingness     = Willingness::where('user_id',$user->id)->where('type',0)->first();
        
        // if($getWillingness == null){
        //     return redirect()->route('admin.scan-logs.create')->with('warning','Hubungi BAS, jam kesediaan masih kosong');
        // }
        // $kesediaanSenin     = $getWillingness->monday;
        // $kesediaanSelasa    = $getWillingness->tuesday;
        // $kesediaanRabu      = $getWillingness->wednesday;
        // $kesediaanKamis     = $getWillingness->thursday;
        // $kesediaanJumat     = $getWillingness->friday;
        // $kesediaanSabtu     = $getWillingness->saturday;

        // $waktuSenin         = Carbon::createFromFormat('H:i:s', $kesediaanSenin);
        // $waktuSelasa        = Carbon::createFromFormat('H:i:s', $kesediaanSelasa);
        // $waktuRabu          = Carbon::createFromFormat('H:i:s', $kesediaanRabu);
        // $waktuKamis         = Carbon::createFromFormat('H:i:s', $kesediaanKamis);
        // $waktuJumat         = Carbon::createFromFormat('H:i:s', $kesediaanJumat);
        // $waktuSabtu         = Carbon::createFromFormat('H:i:s', $kesediaanSabtu);

        // $waktuSenin->addMinutes(11);
        // $waktuSelasa->addMinutes(11);
        // $waktuRabu->addMinutes(11);
        // $waktuKamis->addMinutes(11);
        // $waktuJumat->addMinutes(11);
        // $waktuSabtu->addMinutes(11);

        // $hasilSenin     = $waktuSenin->format('H:i:s');
        // $hasilSelasa    = $waktuSelasa->format('H:i:s');
        // $hasilRabu      = $waktuRabu->format('H:i:s');
        // $hasilKamis     = $waktuKamis->format('H:i:s');
        // $hasilJumat     = $waktuJumat->format('H:i:s');
        // $hasilSabtu     = $waktuSabtu->format('H:i:s');         
        //End Kesediaan
        $scan1 = ScanLog::where('pin', $pin)
            ->whereDate('scan', today())
            ->whereTime('scan', '>=', '05:00:00')
            ->whereTime('scan', '<=', '10:59:59')
            ->first();

        $scan2 = ScanLog::where('pin', $pin)
            ->whereDate('scan', today())
            ->whereTime('scan', '>=', '11:00:00')
            ->whereTime('scan', '<=', '12:59:59')
            ->first();

        $scan3 = ScanLog::where('pin', $pin)
            ->whereDate('scan', today())
            ->whereTime('scan', '>=', '13:00:00')
            ->whereTime('scan', '<=', '13:59:59')
            ->first();

        $scan4 = ScanLog::where('pin', $pin)
            ->whereDate('scan', today())
            ->whereTime('scan', '>=', '14:00:00')
            ->whereTime('scan', '<=', '23:00:00')
            ->latest('scan')
            ->first();

        $scan_logs = ScanLog::where('pin', $pin)
            ->whereBetween('scan', [$startDate, $endDate])
            ->orderBy('scan', 'ASC')
            ->get();

        // $scan_logs_late = ScanLog::where('pin', $pin)
        //     ->whereBetween('scan', [$startDate, $endDate])
        //     ->where('ip_scan','3.1.174.198')
        //     ->whereTime('scan', '<=', Carbon::parse('13:20:00'))
        //     ->orderBy('scan', 'ASC')
        //     ->groupBy('date')
        //     ->get();

            $scan_logs_late = ScanLog::selectRaw('DATE(scan) as date')->where('pin', $pin)
            ->whereBetween('scan', [$startDate, $endDate])            
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();
            
        return view('admin.users.myattendances', 
        compact(
        'scan1',
        'scan2',
        'scan3',
        'scan4',
        'scan_logs',
        'scan_logs_late'
        // 'hasilSenin',
        // 'hasilSelasa',
        // 'hasilRabu',
        // 'hasilKamis',
        // 'hasilJumat',
        // 'hasilSabtu',
        // 'getWillingness'
        ))
        ->with('i');
    }

    public function myAttendancesFilter(Request $request){
        $pin = Auth::user()->pin;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        //$today  = '2023/10/21';
        $scan1 = ScanLog::where('pin', $pin)
            ->whereDate('scan', today())
            ->whereTime('scan', '>=', '05:00:00')
            ->whereTime('scan', '<=', '10:59:59')
            ->first();

        $scan2 = ScanLog::where('pin', $pin)
            ->whereDate('scan', today())
            ->whereTime('scan', '>=', '11:00:00')
            ->whereTime('scan', '<=', '12:59:59')
            ->first();

        $scan3 = ScanLog::where('pin', $pin)
            ->whereDate('scan', today())
            ->whereTime('scan', '>=', '13:00:00')
            ->whereTime('scan', '<=', '13:59:59')
            ->first();

        $scan4 = ScanLog::where('pin', $pin)
            ->whereDate('scan', today())
            ->whereTime('scan', '>=', '14:00:00')
            ->whereTime('scan', '<=', '23:00:00')
            ->latest('scan')
            ->first();

        $scan_logs = ScanLog::where('pin', $pin)
        ->whereDate('scan', '>=', $start_date)
        ->whereDate('scan', '<=', $end_date)
            ->orderBy('scan','ASC')
            ->get();

        return view('admin.users.myattendances', compact('scan1','scan2','scan3','scan4','scan_logs'))->with('i');
    }

    public function requestAttendances()
    {
        $user                   = Auth::user()->id;
        $request_attendances    = AttendancesRequest::where('user_id',$user)->orderBy('created_at','ASC')->get();
        $activities             = Activity::pluck('id','name');

        return view('scan-log.requestAttendances',compact('request_attendances','activities'))->with('i');
    }

    public function requestAttendanceStore(Request $request)
{
    $validator = Validator::make($request->all(), AttendancesRequest::$rules);
    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Periksa kembali format file anda (.png, .jpg, .jpeg) dan pastikan file tidak melebihi 3MB');
    }

    $id             = Auth::user()->id;
    $photo_file     = $request->file('photo');
    $activity_id    = $request->activity_id;
    $keterangan     = $request->keterangan;
    $status         = 0;
    $user_id        = $id;
    $userIP         = request()->ip();
    
    // Compress the image
    $compressedImage = Image::make($photo_file)
        ->encode('jpg', 75) // Change the format and quality as needed
        ->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

    $name_file = time() . "_" . $photo_file->getClientOriginalName();
    $tujuan_upload = 'data_photo_pengajuan';
    $compressedImage->save(public_path($tujuan_upload . '/' . $name_file)); // Save the compressed image

    $attendances_request = AttendancesRequest::create([
        'user_id'       => $user_id,
        'activity_id'   => $activity_id,
        'keterangan'    => $keterangan,
        'status'        => $status,
        'photo'         => $name_file,
        'ip_scan'       => $userIP,
        'created_at'    => now()
    ]);

    return redirect()->back()
        ->with('success', 'Berhasil menambahkan data Pengajuan, silahkan menunggu untuk persetujuan dari BAS.');
}

    public function viewRequestAttendances(){
        $request_attendances    = AttendancesRequest::orderBy('status','ASC')->orderBy('created_at','ASC')->get();

        return view('scan-log.viewRequestAttendances',compact('request_attendances'))->with('i');
    }
    public function filterRequestAttendances(Request $request){
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $request_attendances    = AttendancesRequest::whereDate('created_at', '>=', $start_date)
        ->whereDate('created_at', '<=', $end_date)
        ->orderBy('status','ASC')
        ->orderBy('created_at','ASC')
        ->latest()
        ->get();

        return view('scan-log.viewRequestAttendances',compact('request_attendances'))->with('i');
    }

    public function processRequest(Request $request, $id)
{
    $attendances_request    = AttendancesRequest::find($id);
    $getId                  = $attendances_request->user_id;
    $status                 = $request->status;
    $scan                   = $request->scan;
    $getPin                 = User::find($getId);
    $pin                    = $getPin->pin;
    $userIP                 = $attendances_request->ip_scan;

    $scanTime               = Carbon::parse($scan);
    $time                   = $scanTime->format('H:i:s');
    $cutoffTime             = '15:59:00';

    if ($time <= $cutoffTime) {
        $scan_log = ScanLog::create([
            'pin' => $pin,
            'scan' => $scan,
            'verify' => 1,
            'status_scan' => 0,
            'ip_scan' => $userIP,
            'created_at' => now(),
        ]);
        $attendances_request->update([
            'status' => $status,
        ]); 
    }
        else{

            $scan_log_extra = ScanLogsExtra::create([
                'pin' => $pin,
                'scan' => $scan,
                'verify' => 1,
                'status_scan' => 0,
                'ip_scan' => $userIP,
                'created_at' => now(),
            ]);

            $scan_log = ScanLog::create([
                'pin' => $pin,
                'scan' => $scan,
                'verify' => 1,
                'status_scan' => 0,
                'ip_scan' => $userIP,
                'created_at' => now(),
            ]);

            $attendances_request->update([
                'status' => $status,
            ]); 
        }

    return redirect()->back()->with('success', 'Berhasil memperbarui Status Pengajuan');
}

    public function rejectRequest(Request $request, $id)
    {
        $attendances_request = AttendancesRequest::find($id); 
        $getId  = $attendances_request->user_id; 
        $status = $request->status;
        $scan   = $request->scan;
        $getPin = User::find($getId);
        $pin    = $getPin->pin;

        $scanTime               = Carbon::parse($scan);
        $time                   = $scanTime->format('H:i:s');
        $cutoffTime             = '15:59:00';

        $attendances_request->update([
                'status' => $status,
        ]);
        if ($time <= $cutoffTime) {
        $scan_logs  = ScanLog::where('pin',$pin)->where('scan',$scan)->delete();
        }
        else{
            $scan_logs_extra  = ScanLogsExtra::where('pin',$pin)->where('scan',$scan)->delete();
            $scan_logs  = ScanLog::where('pin',$pin)->where('scan',$scan)->delete();
        }

        return redirect()->back()->with('warning','Berhasil memperbarui Status Pengajuan');
    }

    public function detailData()
    {
        if (! Gate::allows('bas_menu')) {
            return abort(401);
        }
        $scanLogs = ScanLog::join('users', 'scan_logs.pin', '=', 'users.pin')
            ->whereDate('scan', today())
            ->orderBy('users.name', 'ASC')
            ->orderBy('scan', 'ASC')  // You can change 'ASC' to 'DESC' if you want descending order
            ->get();
            $groupedScanLogs = $scanLogs->groupBy('user.name');
        return view('scan-log.detail',compact('scanLogs','groupedScanLogs'))->with('i');
    }
    public function detailDataFilter(Request $request)
    {
        $date = $request->date;

        if (! Gate::allows('bas_menu')) {
            return abort(401);
        }
        $scanLogs = ScanLog::join('users', 'scan_logs.pin', '=', 'users.pin')
            ->whereDate('scan', $date)
            ->orderBy('users.name', 'ASC')
            ->orderBy('scan', 'ASC')  // You can change 'ASC' to 'DESC' if you want descending order
            ->get();
            $groupedScanLogs = $scanLogs->groupBy('user.name');
        return view('scan-log.detail',compact('scanLogs','groupedScanLogs'))->with('i');
    }

    public function print()
    {
        if (! Gate::allows('bas_menu')) {
            return abort(401);
        }
        // Hitung startDate (bulan lalu dengan tanggal 26)
        $startDate = Carbon::now()->subMonth()->startOfMonth()->addDays(25);

        // Hitung endDate (bulan ini dengan tanggal 25)
        $endDate = Carbon::now()->startOfMonth()->addDays(24);

        $scanLogs = ScanLog::whereBetween('scan', [$startDate, $endDate])
        ->where('ip_scan','3.1.174.198')
        ->orderBy('scan', 'ASC')
        ->get();

        return view('scan-log.print',compact('scanLogs'));
    }

    public function printResult(Request $request)
    {
        if (! Gate::allows('bas_menu')) {
            return abort(401);
        }
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $scanLogs = ScanLog::whereDate('scan', '>=', $start_date)
        ->whereDate('scan', '<=', $end_date)
        ->orderBy('scan', 'ASC')
        ->get();

        return view('scan-log.print',compact('scanLogs'));
    }

    public function checkAttendance()
    {
        if (! Gate::allows('bas_menu')) {
            return abort(401);
        }
         // Peroleh tanggal 26 bulan lalu
         $startDate = Carbon::now()->subMonth()->startOfMonth()->addDays(25);

         // Peroleh tanggal 25 bulan ini jika bulan ini memiliki kurang dari 25 hari, jika tidak gunakan hari terakhir dari bulan ini
         $currentDay = Carbon::now()->day;
         $endDateDay = $currentDay >= 26 ? 25 : min($currentDay, 25);
 
         // Periksa apakah bulan lalu memiliki 31 hari
         $lastMonthDays = Carbon::now()->subMonth()->endOfMonth()->day;
         $endDateDay = $lastMonthDays == 31 ? 26 : $endDateDay;
         $endDate = Carbon::now()->startOfMonth()->addDays($endDateDay - 1);

        $scanLogs = ScanLog::join('users', 'scan_logs.pin', '=', 'users.pin')
        ->where('ip_scan','3.1.174.198')->whereBetween('scan', [$startDate, $endDate])        
        ->orderBy('users.name', 'ASC')
        ->orderBy('scan', 'ASC')
        ->get();

        return view('scan-log.check-attendances',compact('scanLogs'))->with('i');
    }
    public function checkAttendanceFilter(Request $request)
    {
        if (! Gate::allows('bas_menu')) {
            return abort(401);
        }

        $startDate = $request->start_date;
        $endDate = $request->end_date;
        // whereDate('scan', '>=', $start_date)
        //     ->whereDate('scan', '<=', $end_date)

        $scanLogs = ScanLog::join('users', 'scan_logs.pin', '=', 'users.pin')
        ->where('ip_scan','3.1.174.198')->whereBetween('scan', [$startDate, $endDate])        
        ->orderBy('users.name', 'ASC')
        ->orderBy('scan', 'ASC')
        ->get();

        return view('scan-log.check-attendances',compact('scanLogs'))->with('i');
    }

    public function selectPeriodLate()
    {
        return view('scan-log.select-late-period');
    }

    public function resultLate(Request $request){
        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');

        $users    = User::select('pin','position','name','nomor_induk')->where('pin', '<>', null)->where('pin', '<>',50)->where('pin', '<>', 38)
        ->orderBy('name','ASC')->get();

        return view('scan-log.result-late',
        compact('users',
        'start_date',
        'end_date'))
        ->with('i');
    }
}