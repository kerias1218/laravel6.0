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

/*
Route::get('/', function () {
    return view('welcome');
});
*/


//qerLog();

Route::resource('articles','ArticlesController');



function qerLog() {
    DB::listen(function($qer){
        var_dump($qer->sql);
    });

}