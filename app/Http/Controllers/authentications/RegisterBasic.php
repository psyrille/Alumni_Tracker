<?php

namespace App\Http\Controllers\authentications;

use Exception;
use App\Models\Register;
use App\Models\SISaccount;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RegisterAlumni;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class RegisterBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-register-basic');
  }

  public function registerAlumni(Request $req){
    $data = [
      'studentNo' => $req->studentNo,
      'studentPassword' => $req->password,
      'studentCampus' => $req->campus
    ];

    $pword = sha1(trim($data['studentPassword'])."nestnie!@#$");

    $registeredAccount = RegisterAlumni::on('mysql')->where('studentNo', $data['studentNo'])->first();

    if($registeredAccount != null){
      return response()->json([
        'status_code' => 2,
        'Message' => "Account is already registered"
      ]);
    }

    $checkAccount = SISaccount::on('sg')
                    ->where('StudentNo', $data['studentNo'])
                    ->where('Password', $pword)
                    ->first();

    if($checkAccount != null){
      return response() -> json([
        'status_code' => 0,
        'studentNo' => Crypt::encryptString($data['studentNo']),
        'password' => $pword
      ]);
    }else{
      return response() -> json([
        'status_code' => 1,
        'Message' => 'Invalid Account'
      ]);
    }

  }

  public function registerEdit(){
    return view('content.authentications.auth-register-edit-basic');
  }

  public function getInfo(Request $req){
    $studentNo = Crypt::decryptString($req->studentNoValue);

    $student = Register::on('sg')
      ->select('FirstName', 'MiddleName', 'LastName', 'email', 'course', 'ContactNo', 'p_municipality', 'p_street', 'p_province','course.course_title as course', 'Sex')
      ->where('StudentNo', $studentNo)
      ->join('course', 'course.id', '=', 'students.course')
      ->first();

    $data = [
      'studentNo' => $studentNo,
      'firstName' => $student->FirstName,
      'lastName' => $student->LastName,
      'middleName' => $student->MiddleName,
      'email' => $student->email,
      'contact' =>$student->ContactNo,
      'address' => $student->p_street.', '.Str::title($student->p_municipality).', '.Str::title($student->p_province),
      'course' => $student->course,
      'sex' => $student->Sex

    ];

    return response() -> json([
      'data' => $data
    ]);
  }

  public function registerStudent(Request $req){
    $data = [
      'studentNo' => $req->studentNo,
      'firstName' => $req->firstName,
      'middleName' => $req->middleName,
      'lastName' => $req->lastName,
      'email' => $req->email,
      'course' => $req->course,
      'yearGrad' => $req->yearGrad,
      'contactNo' => $req->contactNo,
      'facebook' => $req->fbAcc,
      'address' => $req->address,
      'status' => "pending",
      'campus' => "Main Campus - Sogod",
      'password' => $req->password,
      'type' => 'user'
    ];


    try{
      $query = RegisterAlumni::on('mysql')
            ->insert(array($data));

      return response() -> json([
        'status_code' => 0
      ]);
    }
    catch(Exception $e){
      return response() -> json([
        'status_code' => 1
      ]);
    }



  }
}
