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
        'year' => $req->data['year'],
        'name' => $req->data['name'],
        'country' => $req->data['country'],
        'region' => $req->data['region'],
        'province' => $req->data['province'],
        'municipality' => $req->data['municipality'],
        'barangay' => $req->data['barangay'],
        'company_name' => $req->data['company'],
        'company_contact' => $req->data['contact']
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
      $address = $req->edit_address;



      try{
        User::where('id', Auth::id())->update([
          'address' => $address
        ]);

        return response()->json([
          'status_code' => 0,
          'new_address' => $address,
          'Message' => "Changes are successfully saved"
        ]);
      }catch(Exception $e){
        return response()->json([
          'status_code' => 1,
          'Message' => $e->getMessage()
        ]);
      }
    }

    public function editContact(Request $req){
      $data = [
        'facebook' => $req->edit_facebook,
        'contactNo' => $req->edit_contact
      ];

      try{
        User::where('id' , Auth::id())->update($data);
        return response()->json([
          'status_code' => 0,
          'new_facebook' => $data['facebook'],
          'new_contactNo' => $data['contactNo'],
          'Message' => "Changes are successfully saved"
        ]);
      }catch(Exception $e){
        return response()->json([
          'status_code' => 1,
          'Message' => $e->getMessage()
        ]);
      }

    }

    public function editAccount(Request $req){
      $data = [
        'email' => $req->edit_email,
        'password' => $pword = sha1(trim($req->edit_password)."nestnie!@#$")
      ];

      try{
        User::where('id', Auth::id())->update($data);
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

    public function deleteWork(Request $req){
      $id = $req->id;

      try{
        Work::where('id', $id)->delete();

        return response()->json([
          'status_code' => 0,
          'message' => "Work has been deleted."
        ]);
      }catch(Exception $e){
        return response()->json([
          'status_code' => 1,
          'message' => $e->getMessage()
        ]);
      }
    }

}
