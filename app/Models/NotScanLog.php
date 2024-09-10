<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NotScanLog
 *
 * @property $id
 * @property $pin
 * @property $reason_id
 * @property $note
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class NotScanLog extends Model
{
    
    static $rules = [
		'pin' => 'required',
		'reason_id' => 'required',
		'note' => 'required',
		'date' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'not_scan_logs';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['pin','reason_id','note','date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'pin', 'pin');
    }

}
