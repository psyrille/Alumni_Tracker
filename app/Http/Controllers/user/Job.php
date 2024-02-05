<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Job extends Controller
{
  public function index(){
    return view('content.user.job-opportunities');
  }
}
