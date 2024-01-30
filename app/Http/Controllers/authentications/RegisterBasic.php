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

  public function registerAlumni(Request $req){
    $studentNo = $req->studentNo;
    $studentPassword = $req->password;

    $checkStudent = Register::where('StudentNo', $studentNo)->where('password', $studentPassword);
    
  }
}
