<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PerformanceAppraisal
 *
 * @property $id
 * @property $pin
 * @property $period
 * @property $year
 * @property $late_total
 * @property $pure_pa
 * @property $contribution
 * @property $note
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PerformanceAppraisal extends Model
{
    
    static $rules = [
		'pin' => 'required',
		'period' => 'required',
		'year' => 'required',
		'late_total' => 'required',
		'pure_pa' => 'required',
		'contribution' => 'required',
		'note' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['pin','period','year','late_total','pure_pa','contribution','note'];



}
