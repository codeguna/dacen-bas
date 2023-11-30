<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AttendancesRequest
 *
 * @property $id
 * @property $user_id
 * @property $photo
 * @property $keterangan
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AttendancesRequest extends Model
{
    
    static $rules = [
		'photo' => 'required|image|mimes:jpg,jpeg|max:3072',
		'keterangan' => 'required',
        'activity_id' => 'required'
    ];

    protected $perPage = 20;
    protected $table = 'attendances_request';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','photo','keterangan','status','activity_id','ip_scan'];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}