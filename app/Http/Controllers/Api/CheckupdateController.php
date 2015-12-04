<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CheckupdateController extends Controller
{
    public function check(Request $request){
        Log::info($request);
    }
}
