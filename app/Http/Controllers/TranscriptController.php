<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TranscriptController extends Controller
{
    public function index(){
        return view('content.transtrcipt-of-records.tor');
    }
}
