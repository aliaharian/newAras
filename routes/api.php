<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!

*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('products', 'Api\ApiProductController');
Route::get('homepage', 'Api\MainController@homepage');


Route::post('/testfinger',function(Request $request){


    // $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
    // $aa=$request->body;
    // $txt = $aa.'\n\n\n\n';
    // fwrite($myfile, $txt);
    // $txt = "Jane Doe\n";
    // fwrite($myfile, $txt);
    // fclose($myfile);
    return response()->json($request);
});
