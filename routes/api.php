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
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix'=>'unit'], function(){
    //Route::get('/get', 'UnitRumahController@Get');
    //->middleware('jwt.auth');
    Route::get('/get',function () {
        
        $list = DB::table('unit_rumahs as p')
        ->select('p.kavling', 'p.blok', 'p.no_rumah', 'p.harga_tanah', 'p.luas_tanah', 'p.luas_bangunan')
        ->get();
        return response()->json($list, 200);
    });
    Route::post('/create', 'UnitRumahController@CreateUnit');
    Route::post('/delete/{id}', 'UnitRumahController@DeleteUnit');
});