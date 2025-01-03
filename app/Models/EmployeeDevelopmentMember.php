<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeeDevelopmentMember
 *
 * @property $id
 * @property $employee_developments_id
 * @property $user_id
 * @property $certificate_attachment
 * @property $created_at
 * @property $updated_at
 *
 * @property EmployeeDevelopment $employeeDevelopment
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EmployeeDevelopmentMember extends Model
{
    
    static $rules = [
		'certificate_attachment' => 'required|mimes:pdf,jpg,jpeg|max:2048',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['employee_developments_id','user_id','certificate_attachment'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employeeDevelopment()
    {
        return $this->belongsTo('App\Models\EmployeeDevelopment', 'employee_developments_id','id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
