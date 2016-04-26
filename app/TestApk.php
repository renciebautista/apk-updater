<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestApk extends Model
{
    protected $fillable = ['app_name', 'pkgname', 'version', 'version_name', 'md5', 'filename', 'filesize', 'token'];

    public static function packageExist($package_name){
    	$apk =  self::where('pkgname',$package_name)->first();

    	if(!empty($apk)){
    		return true;
    	}else{
    		return false;
    	}
    }
}
