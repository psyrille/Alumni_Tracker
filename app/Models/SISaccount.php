<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SISaccount extends Model
{
    protected $table = 'accountstudents';
    protected $connection;
    public $timestamps = false; //parang d mo require deleted at
    protected $fillable = [
        'StudentNo', 'Password'
    ];
}
