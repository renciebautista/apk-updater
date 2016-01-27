<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', ['as' => 'apk.index', 'uses' => 'ApkController@index']);


Route::get('/test', function () {


	$file = storage_path()."/apk/app-debug.apk";

// echo 'MD5 file hash of ' . $file . ': ' . md5_file($file);

	$bytes = File::size($file);

	// dd(str_format_filesize($bytes));


    $apk = new \ApkParser\Parser($file);

	$manifest = $apk->getManifest();

	$labelResourceId = $apk->getManifest()->getApplication()->getLabel();
	$appLabel = $apk->getResources($labelResourceId);


	echo $appLabel[0];

	echo '<pre>';
	echo "Application Name  : " . $appLabel[0]  . "\r\n";
	echo "Package Name      : " . $manifest->getPackageName()  . "\r\n";
	echo "Version           : " . $manifest->getVersionName()  . " (" . $manifest->getVersionCode() . ")\r\n";
	echo "Min Sdk Level     : " . $manifest->getMinSdkLevel()  . "\r\n";
	echo "Min Sdk Platform  : " . $manifest->getMinSdk()->platform ."\r\n";

	echo "------------- Permssions List -------------\r\n";

});

Route::resource('apk', 'ApkController');

Route::group(array('prefix' => 'api'), function()
{
	Route::get('test', 'Api\UpdateapkController@index');
	Route::get('protected/{token}/{file_name}', 'Api\UpdateapkController@download');
	Route::post('check', 'Api\CheckupdateController@check');
	
});