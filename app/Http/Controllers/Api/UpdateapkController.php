<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UpdateapkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // echo "have update\n";
        // // echo "no update\n";
        // echo "http://apps.chasetech.com/api/protected\n";

        echo "have update\n";
        echo "http://apps.chasetech.com/api/protected/app-debug.apk\n";
        
    }

    public function download(Request $request){
        // // $entry = Fileentry::where('file_id', '=', $fileId)->firstOrFail();
        // // $pathToFile=storage_path()."/app/".$entry->filename;
        $pathToFile = storage_path()."/apk/app-debug.apk";
        // // return response()->download($pathToFile);
        // return  response()->download($pathToFile, 'app-debug.apk', ['Content-Type: text/cvs']);


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
            ob_clean();
            flush();
            readfile($file);
            exit;
        }
    }
}
