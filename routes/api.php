<?php

use Illuminate\Http\Request;

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
Route::prefix('/update')->group( function () {
    Route::middleware('auth:api')->put('/stand', 'StandsController@updateStand');
    Route::middleware('auth:api')->put('/laboratory', 'LaboratoryController@updateLaboratory');
    Route::middleware('auth:api')->put('/detail', 'DetailController@updateDetail');
    Route::middleware('auth:api')->put('/stand_link', 'StandsController@updateStandLink');
});


Route::prefix('/user')->group( function () {
    Route::middleware('auth:api')->get('/', 'UserController@getUser');
    Route::post('/login', 'api\v1\LoginController@login');
    Route::post('/create_user', 'UserController@createUser');
});


Route::get('/get_data_info', function () {
    return [
        "labels" => ["11:00", "12:00", "13:00", "14:00", "16:00", "17:00"],
        "datasets" => [
          [
            "label" => "Температура до модифікації",
            "data" => [0, 20, 35, 40, 40, 40, 40]
          ],
          [
            "label" => "Температура після модифікації",
            "data" => [0, 20, 15, 14, 13, 10, 10]
          ]
        ]
        ];
});
