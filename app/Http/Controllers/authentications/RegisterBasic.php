<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-register-basic');
  }

  public function registerEdit(){
    return view('content.authentications.auth-register-edit-basic');
  }
}
