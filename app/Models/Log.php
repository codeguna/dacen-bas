<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'browser', 'os', 'ip'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
