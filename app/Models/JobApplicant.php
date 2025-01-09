<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class JobApplicant
 *
 * @property $id
 * @property $job_vacancies_id
 * @property $full_name
 * @property $front_title
 * @property $back_title
 * @property $gender
 * @property $born_place
 * @property $born_date
 * @property $date_of _application
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class JobApplicant extends Model
{

  static $rules = [
    'full_name' => 'required',
    'back_title' => 'required',
    'gender' => 'required',
    'born_place' => 'required',
    'born_date' => 'required',
    'date_of _application' => 'required',
    'level' => 'required',
    'university' => 'required',
    'major' => 'required',
    'university_base' => 'required',
    'graduation_year' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = [
    'job_vacancies_id',
    'full_name',
    'front_title',
    'back_title',
    'gender',
    'born_place',
    'born_date',
    'date_of _application',
    'is_approved',
    'level',
    'university',
    'major',
    'university_base',
    'graduation_year'
  ];
}
