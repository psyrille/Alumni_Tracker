<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class Accounts extends Controller
{
    public function index(){
      $pendingAccounts = User::where('status', 'pending')->get();

      return view('content.admin.accounts.pending', compact('pendingAccounts'));
    }

    public function approveAccount(Request $req){


      $query = User::where('id', $req->sid)->update([
        'status' => 'approved'
      ]);


      if($query){
        return response()->json([
          'status_code' => 0,
          'Message' => "Account Approved"
        ]);
      }else{
        return response()->json([
          'status_code' => 1,
          'Message' => "There was an error during the process"
        ]);
      };



    }

    public function disapproveAccount(Request $req) {
      $sid = $req->sid;

      $query = User::where('id', $sid)->update([
        'status' => 'disapproved',
        'reason_disapproval' => $req->text
      ]);

      $alumni = User::where('id', $sid)->first();

      $emailRes = Mail::to($alumni->email)->send(new \App\Mail\Webmail([
                    "Sender"=>"SLSU Admission",
                    "Subject"=>"Document Submitted Status",
                    "Message"=>$req->text,
                    "FirstName"=>$alumni->firstName,
                    "LastName"=>$alumni->lastName,
                    "Initiator"=>"disapprove"
                ]));


      if($query){
        return response()->json([
          'status_code' => 0,
          'Message' => "Account Disapproved."
        ]);
      }else{
        return response()->json([
          'status_code' => 1,
          'Message' => "There was an error during the process"
        ]);
      }


    }


}
