<?php

namespace App\Http\Controllers;

use App\Models\Province;
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
}
