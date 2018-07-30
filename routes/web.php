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

use Illuminate\Http\Request;

Route::get('/', ['as' => 'home', function (Request $request) {
    $url = $request->input('url');
    if (strpos($url, 'books'))
        return view('books', ['urlparam' => $url]);
    if (strpos($url, 'albums'))
        return view('albums', ['urlparam' => $url]);
    if (strpos($url, 'shelves'))
        return view('shelves',['urlparam' => $url]);
    return view('welcome');
}]);

