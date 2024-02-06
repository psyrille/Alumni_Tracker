<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\Province;
use App\Models\Municipal;
use Illuminate\Http\Request;


class Address extends Controller
{
  public function region(Request $req){
    $code = $req->region;

    $data = Province::select('*')->where('regCode', $code)->get();

    return response()->json([
      'data' => $data
    ]);
  }

  public function municipality(Request $req){
    $code = $req->code;

    $data = Municipal::select('*')->where('provCode', $code)->get();

    return response()->json([
      'data' => $data
    ]);
  }

  public function barangay(Request $req){
    $code = $req->code;

    $data = Barangay::select('*')->where('citymunCode', $code)->get();

    return response()->json([
      'data' => $data
    ]);
  }
}
