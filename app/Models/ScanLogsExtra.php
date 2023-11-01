<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ScanLogsExtra
 *
 * @property $id
 * @property $pin
 * @property $scan
 * @property $verify
 * @property $status_scan
 * @property $ip_scan
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ScanLogsExtra extends Model
{
    
    static $rules = [		
		'scan' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'scan_logs_extra';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['pin','scan','verify','status_scan','ip_scan'];

    public function user()
    {
        return $this->belongsTo(User::class, 'pin', 'pin');
    }


}