<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'refcountry';
    protected $fillable = [
      'id', 'iso', 'name', 'nicename' ,'iso3', 'numcode', 'phonecode'
    ];
}
