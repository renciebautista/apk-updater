<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CheckupdateController extends Controller
{
    public function check(Request $request){
        echo "have update\n";
        echo "http://apps.chasetech.com/api/protected\n";
    }
}
