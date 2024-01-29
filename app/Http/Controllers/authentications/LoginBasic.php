<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }
  public function adminIndex()
  {
    return view('content.authentications.auth-login-admin-basic');
  }

  public function loginAdmin(Request $request){
    $checkType = User::select('type')->where('email', $request->email)->first();

    if($checkType->type === 'admin'){
      return response() -> json([
        'status_code' => 0,
      ]);
    }else{
      return false;
    }

    if($checkType->type !== 'admin'){
      return false;
    }
    
  }
}
