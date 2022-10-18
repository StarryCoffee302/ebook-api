<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('coba', function () {
    return "こんにちわ、 渡し 名前和 泉ーです";
});

//objek json
Route::get('coba1', function () {
    return view('petra', 'mus', 'starry');
});

// objek json
Route::get('coba2', function () {
    return [
        'Nama' => 'Muhammad Bintang',
        'Kelas' => 'XII RPL 5',
        'NIS' => 3103120143
    ];
});

Route::get('coba3', function () {
    return response()->json( 
        [
        'Nama' => 'Muhammad Bintang',
        'Kelas' => 'XII RPL 5',
        'NIS' => 3103120143
        ],201

);
});