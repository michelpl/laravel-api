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
    return '
██╗      █████╗ ██████╗  █████╗ ██╗   ██╗███████╗██╗          █████╗ ██████╗ ██╗
██║     ██╔══██╗██╔══██╗██╔══██╗██║   ██║██╔════╝██║         ██╔══██╗██╔══██╗██║
██║     ███████║██████╔╝███████║██║   ██║█████╗  ██║         ███████║██████╔╝██║
██║     ██╔══██║██╔══██╗██╔══██║╚██╗ ██╔╝██╔══╝  ██║         ██╔══██║██╔═══╝ ██║
███████╗██║  ██║██║  ██║██║  ██║ ╚████╔╝ ███████╗███████╗    ██║  ██║██║     ██║
╚══════╝╚═╝  ╚═╝╚═╝  ╚═╝╚═╝  ╚═╝  ╚═══╝  ╚══════╝╚══════╝    ╚═╝  ╚═╝╚═╝     ╚═╝';
});

Route::prefix('/products')->group(function () {

    Route::post('/', function (Request $request) {
        return response(
            [
                'id' => 15,
                'name' => $request->name,
                'description' => $request->description

            ],
            201
        );
    });


    Route::get('/', function () {
        return [
            [
                'id' => 15,
                'name' => 'Iphone',
                'description' => "iPhone is a revolutionary new mobile phone that allows you to make a call by simply tapping a name"
            ],
            [
                'id' => 7,
                'name' => 'Canon 110',
                'description' => "Canon's press material for the EOS 5D states that it defines (a) new D-SLR category"
            ],
            [
                'id' => 11,
                'name' => 'Nikon D300',
                'description' => "Engineered with pro-level features and performance, the 12.3-effective-megapixel D300 combines brand"
            ]
        ];
    });

    Route::get('{id}', function ($id) {
        $products = [
            [
                'id' => 15,
                'name' => 'Iphone',
                'description' => "iPhone is a revolutionary new mobile phone that allows you to make a call by simply tapping a name"
            ],
            [
                'id' => 7,
                'name' => 'Canon 110',
                'description' => "Canon's press material for the EOS 5D states that it defines (a) new D-SLR category"
            ],
            [
                'id' => 11,
                'name' => 'Nikon D300',
                'description' => "Engineered with pro-level features and performance, the 12.3-effective-megapixel D300 combines brand"
            ]
        ];

        foreach ($products as $product) {
            if (isset($product['id']) && $product['id'] == $id) {
                return $product;
            }
        }

        return response('', 404);
    });
});