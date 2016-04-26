<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Apk;
use App\TestApk;

class CheckupdateController extends Controller
{
    public function check(Request $request){
    	$pkgname = $request->input('pkgname', 'www.chasetch.com');
    	$version = $request->input('version', 0);
    	$filemd5 = $request->input('md5', 0);
    	$deviceid = $request->id;

    	$apk = Apk::where('pkgname', $pkgname)
            ->first();
    	if(!empty($apk)){
    		if($apk->version > $version){
    			echo "have update\n";
                echo action('Api\UpdateapkController@download', array('token' => $apk->token, 'filename' => $apk->filename))."\n";
    		}else{
    			echo "no update available\n";
    		}
    	}else{
    		echo "apk not found\n";
    	}
    }

    public function betacheck(Request $request){
        $pkgname = $request->input('pkgname', 'www.chasetch.com');
        $version = $request->input('version', 0);
        $filemd5 = $request->input('md5', 0);
        $deviceid = $request->id;

        $apk = TestApk::where('pkgname', $pkgname)
            ->first();
        if(!empty($apk)){
            if($apk->version > $version){
                echo "have update\n";
                echo action('Api\UpdateapkController@betadownload', array('token' => $apk->token, 'filename' => $apk->filename))."\n";
            }else{
                echo "no update available\n";
            }
        }else{
            echo "apk not found\n";
        }
    }
}
