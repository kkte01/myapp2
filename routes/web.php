<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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

//Route::get('/', function () {
//    //return view('welcome');
//    return '<h1>Hello Foo</h1>';
//});

// 코드 3-5 app/Http/routes.php
//Route::get('/{foo?}', function ($foo = 'bar') {
//    return $foo;
//});
// 코드 3-6 app/Http/routes.php
//Route::pattern('foo', '[0-9a-zA-Z]{3}');
//
//Route::get('/{foo?}', function ($foo = 'bar') {
//    return $foo;
//});
// 코드 3-7 app/Http/routes.php
//Route::get('/{foo?}', function ($foo = '기본 값') {
//    return $foo;
//})->where('foo', '[0-9a-zA-Z]{3}')->name('foo');
// 코드 3-8 app/Http/routes.php
//Route::get('/', function () {
//        return '제 이름은 "home" 입니다.';
//    })->name('home');
//
//Route::get('/home', function () {
//    return redirect(route('home'));
//});
//
//Route::get('/second', function () {
//    return view('second.second');
//});

// 코드 4-2 app/Http/routes.php
//Route::get('/', function () {
//    return view('test')->with('name', '김판우');
//});
// 코드 4-4 app/Http/routes.php
//Route::get('/', function () {
//    return view('test')->with([
//        'name' => '판우',
//        'greeting' => '안녕하세요?',
//    ]);
//});
// 코드 4-5 app/Http/routes.php
//Route::get('/', function () {
//    return view('test', [
//        'name' => '판우',
//        'greeting' => '안녕하세요?',
//    ]);
//});
//Route::get('/', function () {
//    $items = ['apple', 'banana', 'tomato'];
//    return view('test', ['items' => $items]);
//});
//Route::get('/', function () {
//    return view('test');
//});

Route::get('/',[WelcomeController::class, 'index'])->name('index');
Route::resource('articles', ArticlesController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect(route('articles.index'));
})->name('dashboard');
// 코드 16-3 app/Http/routes.php
Route::get('mail', function () {
    $article = App\Models\Article::with('user')->find(1);
//    return Mail::send(
//        'emails.articles.created',
//        compact('article'),
//        function ($message) use ($article){
//            $message->to('kkte03@gmail.com');
//            $message->subject('새 글이 등록되었습니다 -' . $article->title);
//        }
//    );
    //return
        Mail::send(
        'emails.articles.created',
        compact('article'),
        function ($message) use ($article){
            $message->from('kwan@example.com', 'PanWoo');
            $message->to('kkte03@gmail.com');
            $message->subject('새 글이 등록되었습니다 -' . $article->title);
            $message->cc('kkte03@gmail.com');
            //$message->attach(storage_path('good.png'));
        }
    );
//    // 코드 16-7 app/Http/routes.php
//    Mail::send(
//        ['text' => 'emails.articles.created-text'],
//        compact('article'),
//        function ($message) use ($article){
//            $message->to('kkte03@gmail.com');
//            $message->subject('새 글이 등록되었습니다 -' . $article->title);
//        }
//    );
    echo"텍스트 파일 전송 완료";
});
// 코드 17-1 app/Http/routes.php

Route::get('markdown', function () {
    $text =<<<EOT
# 마크다운 예제 1

이 문서는 [마크다운][1]으로 썼습니다. 화면에는 HTML로 변환되어 출력됩니다.

## 순서 없는 목록

- 첫 번째 항목[1]
- 두 번째 항목[^1]

[1]: http://daringfireball.net/projects/markdown

[^1]: 두 번째 항목_ http://google.com
EOT;

    return app(ParsedownExtra::class)->text($text);
});
