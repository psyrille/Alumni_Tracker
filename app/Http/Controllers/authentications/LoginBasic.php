<?php

namespace App\Http\Controllers\authentications;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }

  public function login(Request $request){
    try {

      $this->checkTooManyFailedAttempts();




      $email = $request->email;
      $password = sha1(trim($request->password)."nestnie!@#$");

      $query = User::select('*')->where('email', $email)->where('password', $password)->where('type', 'user')->first();

      if($query != null){
        Auth::login($query);
      }else{
        RateLimiter::hit($this->throttleKey(), $seconds = 3600);

        throw new Exception('Invalid username or password. Attempts remaining: '. RateLimiter::remaining($this->throttleKey(), 11));
      }

      RateLimiter::clear($this->throttleKey());

      return response() -> json([
        'status_code' => 0
      ]);



    } catch (Exception $error) {
      return response()->json([
            'status_code' => 1,
            'Message' => $error->getMessage(),
      ]);
    }

  }


  public function throttleKey()
  {
      return request('email') . '|' . request()->ip();
  }


  public function checkTooManyFailedAttempts()
  {
      if (! RateLimiter::tooManyAttempts($this->throttleKey(), 10)) {
          return;
      }

      $seconds = RateLimiter::availableIn($this->throttleKey());

      throw new Exception('Too many login attempts. Try again in '. gmdate("H:i:s", $seconds));
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
