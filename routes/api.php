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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/details', 'DetailController@getDetails');
Route::middleware('auth:api')->get('/stands', 'StandsController@getStands');
Route::middleware('auth:api')->get('/laboratories', 'LaboratoryController@getLaboratories');
Route::middleware('auth:api')->get('/details', 'DetailController@getDetails');

Route::prefix('/create')->group( function () {
    Route::middleware('auth:api')->post('/stand', 'StandsController@createStand');
    Route::middleware('auth:api')->post('/laboratory', 'LaboratoryController@createLaboratory');
    Route::middleware('auth:api')->post('/detail', 'DetailController@createDetail');

});

Route::prefix('/delete')->group( function () {
    Route::middleware('auth:api')->delete('/stand', 'StandsController@deleteStand');
    Route::middleware('auth:api')->delete('/laboratory', 'LaboratoryController@deleteLaboratory');
    Route::middleware('auth:api')->delete('/detail', 'DetailController@deleteDetail');

});

Route::prefix('/user')->group( function () {
    Route::middleware('auth:api')->get('/', 'UserController@getUser');
    Route::post('/login', 'api\v1\LoginController@login');
    Route::post('/create_user', 'UserController@createUser');
});
