<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'students';
    protected $connection;
    public $timestamps = false; //parang d mo require deleted at
    protected $fillable = [
        'StudentNo', 'LastName', 'FirstName', 'MiddleName', 'Sex', 'Course'
    ];

    //
    public function __construct(){
        $this->connection = strtolower(session('campus'));
    }
}
