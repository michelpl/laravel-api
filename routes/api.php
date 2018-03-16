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

Route::get('/', function () {
    return 'Laravel API';
});


Route::prefix('/products')->group(function () {

    Route::get('/', function () {
        return [
            15 => [
                'name' => 'Iphone',
                'description' => "iPhone is a revolutionary new mobile phone that allows you to make a call by simply tapping a nam.."
            ],
            17 => [
                'name' => 'Canon 110',
                'description' => "Canon's press material for the EOS 5D states that it defines (a) new D-SLR category"
            ],
            35 => [
                'name' => 'Nikon D300',
                'description' => "Engineered with pro-level features and performance, the 12.3-effective-megapixel D300 combines brand"
            ]
        ];
    });

    Route::get('{id}', function ($id) {
        $products = [
            15 => [
                'name' => 'Iphone',
                'description' => "iPhone is a revolutionary new mobile phone that allows you to make a call by simply tapping a nam.."
            ],
            17 => [
                'name' => 'Canon 110',
                'description' => "Canon's press material for the EOS 5D states that it defines (a) new D-SLR category"
            ],
            35 => [
                'name' => 'Nikon D300',
                'description' => "Engineered with pro-level features and performance, the 12.3-effective-megapixel D300 combines brand"
            ]
        ];

        return $products[$id] ?? response('', 404);
    });
});

/*Route::get('/', function (Request $request){
    return ['A', 'B'];
});

Route::post('/', function (Request $request){
    return ['A', 'B'];
});*/