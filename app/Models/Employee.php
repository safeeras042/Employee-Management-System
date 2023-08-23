<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'department',
        'designation',
        'date_of_joining',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
