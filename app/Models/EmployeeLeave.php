<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeeLeafe
 *
 * @property $id
 * @property $pin
 * @property $amount
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EmployeeLeave extends Model
{

  static $rules = [
    'pin' => 'required',
    'amount' => 'required',
    'year' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $table = 'employee_leaves';
  protected $fillable = ['pin', 'amount', 'year'];

  public function user()
    {
        return $this->belongsTo(User::class,'pin','pin');
    }
}
