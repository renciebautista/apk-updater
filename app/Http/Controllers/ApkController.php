<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

use App\Apk;

class ApkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apks = Apk::all();
        return view('apk.index', compact('apks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $this->validate($request, [
            'file' => 'required'
        ]);

        $file = $request->file('file');
        $original_file_name = $file->getClientOriginalName();
        $file_name = pathinfo($original_file_name, PATHINFO_FILENAME);

        $extension = \File::extension($original_file_name);
        $actual_name = $file_name.'.'.$extension;
        $apk = new \ApkParser\Parser($file);

        $manifest = $apk->getManifest();

        $labelResourceId = $apk->getManifest()->getApplication()->getLabel();
        $appLabel = $apk->getResources($labelResourceId);

        $package_name = $manifest->getPackageName();

        if(Apk::packageExist($package_name)){
            Session::flash('flash_class', 'alert-danger');
            Session::flash('flash_message', 'Apk namespace already exist.');
            return redirect()->route("apk.create");
        }

        Apk::create(array(
            'app_name' => $appLabel[0],
            'pkgname' => $package_name,
            'version' => $manifest->getVersionCode(),
            'md5' => md5_file($file),
            'filename' => $actual_name,
            'filesize' => str_format_filesize(\File::size($file)),
            'token' => md5(uniqid(mt_rand(), true))));


        $folderpath = base_path().'/storage/apk/'.$manifest->getPackageName();
        if (!\File::exists($folderpath))
        {
            \File::makeDirectory($folderpath);
        }

        $file_path = $request->file('file')->move($folderpath,$actual_name);

        return redirect()->route("apk.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apk = Apk::findOrFail($id);
        $path = base_path().'/storage/apk/'.$apk->pkgname.'/'.$apk->filename;
        return \Response::download($path, $apk->file_name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apk = Apk::findOrFail($id);

        $path =  base_path().'/storage/apk/'.$apk->pkgname;
        \File::deleteDirectory($path);

        $apk->delete();
        
        Session::flash('flash_class', 'alert-success');
        Session::flash('flash_message', 'Apk successfully deleted.');
        return redirect()->route("apk.index");

    }
}
