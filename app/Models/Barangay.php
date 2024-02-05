<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
  protected $table = 'refregion';
  protected $fillable = [
    'id', 'brgyCode', 'brgyDesc', 'regCode', 'provCode', 'citymunCode'
  ];
}
