<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipal extends Model
{
  protected $table = 'refcitymun';
  protected $fillable = [
    'id', 'psgcCode', 'citymunDesc', 'regDesc', 'provCode', 'citymunCode', 'ZipCode'
  ];
}
