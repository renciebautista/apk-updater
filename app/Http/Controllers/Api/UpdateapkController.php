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
        
        echo "have update\n";
        echo "http://apps.chasetech.com/api/protected\n";
        
    }

    public function download(Request $request){
        // $entry = Fileentry::where('file_id', '=', $fileId)->firstOrFail();
        // $pathToFile=storage_path()."/app/".$entry->filename;
        $pathToFile=storage_path()."/apk/test.apk";
        return response()->download($pathToFile);

    }
}
