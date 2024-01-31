<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterAlumni extends Model
{
    protected $table = 'users';
    protected $connection;
    protected $fillable = [
        'campus','studentNo', 'firstName', 'middleName', 'lastName', 'email', 'course', 'yearGrad', 'contactNo', 'facebook', 'address','sex'
    ];
}
