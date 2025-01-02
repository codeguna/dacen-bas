<?php

namespace App;

use App\Models\Departmen;
use App\Models\EmployeeDevelopmentMember;
use App\Models\NotScanLog;
use App\Models\ScanLog;
use App\Models\Willingness;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Hash;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 */
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'google_id',
        'nomor_induk',
        'position',
        'pin',
        'birthday',
        'photo',
        'department_id'
    ];

    static $rules = [
        'photo' => 'image|mimes:jpg,jpeg|max:1024',
    ];
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }


    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function scanLogs()
    {
        return $this->hasMany(ScanLog::class, 'pin', 'pin');
    }
    public function notScanLogs()
    {
        return $this->hasMany(NotScanLog::class, 'pin', 'pin');
    }

    public function willingness()
    {
        return $this->hasMany(Willingness::class, 'pin', 'pin');
    }
    public function department()
    {
        return $this->belongsTo(Departmen::class, 'department_id', 'id');
    }
    public function developmentMember()
    {
        return $this->belongsTo(EmployeeDevelopmentMember::class, 'user_id', 'id');
    }
}
