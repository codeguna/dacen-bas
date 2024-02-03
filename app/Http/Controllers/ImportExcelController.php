<?php

namespace App\Http\Controllers;

use App\Imports\HolidaysImport;
use App\Models\Willingness;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\WillingnesessImport;
use Illuminate\Http\Request;

class ImportExcelController extends Controller
{
    public function importWillingness(Request $request)
    {
        $file = $request->file('file'); // Ambil file dari request

        Excel::import(new WillingnesessImport(), $file); // Lakukan impor menggunakan class import yang telah Anda buat

        return redirect()->back()->with('success', 'Data kesediaan berhasil diimpor');
    }

    public function importHolidays(Request $request)
    {
        $file = $request->file('file'); // Ambil file dari request

        Excel::import(new HolidaysImport(), $file); // Lakukan impor menggunakan class import yang telah Anda buat

        return redirect()->back()->with('success', 'Data kesediaan berhasil diimpor');
    }
}