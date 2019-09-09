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

/*
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
*/

Route::get('markdown', function() {
    $text =<<<EDT
# 마크다운 예제 1

이문서는 [마크다운][1] 으로 썻씁니다. 화면에는 html 로 변환되어 출력됩니다.

## 순서 없는 목록

- 첫번째 항목
- 두번째 항목[^1]

[1]: http://markdown.org
[^1]: 두 번째 항목 http://google.com
EDT;

    return app(Parsedown::class)->text($text);

EDT;

});


Route::get('docs/{file?}', 'DocsController@show');

function qerLog() {
    DB::listen(function($qer){
        var_dump($qer->sql);
    });

}
