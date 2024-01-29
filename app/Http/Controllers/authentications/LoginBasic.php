<?php

namespace App\Http\Controllers\authentications;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
    
    $checkType = User::where('email', $request->email)->first();
    

    if(empty($checkType)){ 
      return response() -> json([
        'status_code' => 1,
        'Message' => "You are not allowed to use this system."
      ]);
    }

    Auth::login($checkType);
    $url = "student";

    if($checkType->type == 'admin'){
      
      $url = "/admin/dashboard";
    }
   
    return response() -> json([
      'status_code' => 0,
      'Message' => $url
    ]);


  }

  public function destroy()
    {
        
        Auth::guard('web')->logout();
        Auth::logout();
        return redirect('/auth/login-admin-basic');
    }
}
