<?php

namespace App\Http\Controllers\authentications;

use App\Models\Register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-register-basic');
  }
}
