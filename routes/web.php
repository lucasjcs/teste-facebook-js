<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/img', function(\Illuminate\Http\Request $request)
{
    $img = Image::canvas(800, 600, '#ff0000');

    $req = $request->all();


    $img->insert($req['picture'], 'center');
    $img->text('Olá '.$req['name'],150,100, function ($font){
    	$font->file(resource_path('assets/fonts/fonte.ttf'));
	    $font->size(70);
    });
    // create response and add encoded image data
    $response = Response::make($img->encode('png'));
    $response->header('Content-Type', 'image/png');

    return $response;

});

Route::get('/', function (){
	return view('index');
});

Route::get('/bosta', 'BostaController@index');