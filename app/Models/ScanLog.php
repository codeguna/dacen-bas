<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScanLog extends Model
{
    use HasFactory;

    protected $table = 'scan_logs';
    protected $fillable = ['pin', 'scan', 'verify', 'status_scan', 'ip_scan'];

    public function user()
    {
        return $this->belongsTo(User::class, 'pin', 'pin');
    }
}