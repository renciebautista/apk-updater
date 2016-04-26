<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Apk;
use App\TestApk;

class UpdateapkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //   
    }

    public function download(Request $request, $token, $filename){
        
        $apk = Apk::where('token', $token)
            ->where('filename', $filename)
            ->first();

        if(!empty($apk)){
            $pathToFile = storage_path()."/apk/".$apk->pkgname."/".$apk->filename;

            $apk->downloads = $apk->downloads + 1;
            $apk->update();

            $file = $pathToFile; //not public folder
            if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/vnd.android.package-archive');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                readfile($file);
                exit;
            }
        }

        
    }

    public function betadownload(Request $request, $token, $filename){
        
        $apk = TestApk::where('token', $token)
            ->where('filename', $filename)
            ->first();

        if(!empty($apk)){
            $pathToFile = storage_path()."/beta_apk/".$apk->pkgname."/".$apk->filename;

            $apk->downloads = $apk->downloads + 1;
            $apk->update();

            $file = $pathToFile; //not public folder
            if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/vnd.android.package-archive');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                readfile($file);
                exit;
            }
        } 
    }
}
