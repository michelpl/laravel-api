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

Route::prefix('/')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/', function(){
           return 'Retornar lista de usuários';
        });

        Route::post('', function(){
            return 'Post no usuário';
        });

        Route::get('{id}', function($id){
            return 'Retornar usuário pelo id:' . $id;
        });

        Route::put('{id}', function($id){
            return 'Put no usuário:' . $id;
        });
    });
});
