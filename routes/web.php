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

Route::get('mail',function() {
    $article = App\Article::with('user')->find(1);

    return Mail::send(
        'emails.articles.created',
        compact('article'),
        function($message) use ($article) {
            $message->to('kerias@naver.com');
            $message->subject('새글 등록'.$article->title);
        }
    );
});

function qerLog() {
    DB::listen(function($qer){
        var_dump($qer->sql);
    });

}
