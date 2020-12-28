<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\WelcomeController;
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
