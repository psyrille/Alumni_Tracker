<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $table = 'work';
    protected $fillable = [
      'id', 'user_id', 'year', 'name', 'country','region','province', 'municipality', 'barangay', 'company_name' ,'company_contact'
    ];
}
