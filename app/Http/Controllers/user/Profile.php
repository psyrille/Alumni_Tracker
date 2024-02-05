<?php

namespace App\Http\Controllers\user;

use Exception;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Profile extends Controller
{
    public function index(){
      $works = Work::select('*')->where('user_id' , Auth::id())->orderBy('year', 'desc')->get();

      return view('content.user.profile', compact('works'));
    }

    public function addWork(Request $req){
      $data = [
        'user_id' => Auth::id(),
        'year' => $req->workYear,
        'name' => $req->workName,
        'address' => $req->workAddress,
        'company_name' => $req->workCompany,
        'company_contact' => $req->workContact
      ];

      try{
        Work::insert($data);

        return response()->json([
          'status_code' => 0,
          'data' => $data
        ]);
      }catch(Exception $e){
        return response()->json([
          'status_code' => 1,
        ]);
      }
    }

    public function editAbout(Request $req){
      $address = $req->editAddress;

      User::where('id', Auth::id())->update([
        'address' => $address
      ]);

      try{


        return response()->json([
          'status_code' => 0,
          'Message' => "Changes are successfully saved"
        ]);
      }catch(Exception $e){

      }
    }




}
