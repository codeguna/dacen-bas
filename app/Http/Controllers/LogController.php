<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LogController extends Controller
{
    public function index()
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }

        $logs   = Log::latest()->paginate(20);
        return view('user-log.index',compact('logs'))->with('i');
        
    }

    public function destroy()
    {
        $university = Log::truncate();

        return redirect()->route('admin.logs.index')
            ->with('success', 'Berhasil hapus semua data logs pengguna');
    }
}
