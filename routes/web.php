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

/*Route::get('/', function () {
    return view('login');
});*/

Route::get('/', 'AuthController@login_view');

Route::get('/login', 'AuthController@login_view')->name('login-view');

Route::post('/login', 'AuthController@login')->name('login');

//Route::get('/articles', 'ArticleController@show')->name('articles')->middleware('CheckAuth');
Route::get('/articles/1', 'ArticleController@show_1')->name('articles')->middleware('CheckAuth');
Route::get('/articles/2', 'ArticleController@show_2')->name('articles2')->middleware('CheckAuth');
Route::get('/articles/3', 'ArticleController@show_3')->name('articles3')->middleware('CheckAuth');
Route::get('/articles/4', 'ArticleController@show_4')->name('articles4')->middleware('CheckAuth');
Route::get('/articles/add', 'ArticleController@add')->name('add-article')->middleware('CheckAuth');
Route::post('/articles', 'ArticleController@store')->name('store-article')->middleware('CheckAuth');

Route::get('/article/{id}', 'ArticleController@detail')->middleware('CheckAuth');

Route::get('/article/edit/{id}', 'ArticleController@edit')->middleware('CheckAuth');

Route::post('/article/edit/{id}', 'ArticleController@update')->middleware('CheckAuth');

Route::delete('/article/{id}', 'ArticleController@delete')->middleware('CheckAuth');


Route::get('/qa-ustadz', 'QAController@show_qa_ustadz')->name('qa-ustadz')->middleware('CheckAuth');
Route::get('/qa-ustadz/{id}', 'QAController@detail_qa_ustadz')->middleware('CheckAuth');

Route::post('/qa-ustadz/answer/{id}', 'QAController@answer_qa_ustadz')->middleware('CheckAuth');

Route::get('/qa-dokter', 'QAController@show_qa_dokter')->name('qa-dokter')->middleware('CheckAuth');
Route::get('/qa-dokter/{id}', 'QAController@detail_qa_dokter')->middleware('CheckAuth');

Route::post('/qa-dokter/answer/{id}', 'QAController@answer_qa_dokter')->middleware('CheckAuth');


Route::get('/users', 'UserController@show')->name('users')->middleware('CheckAuth');

Route::get('/logout', 'AuthController@logout')->name('logout')->middleware('CheckAuth');

/*
Route::get('/test-session', function () {
	//session(['user' => ['1', '2', '3']]);
	session()->forget('user');
});

Route::get('/test-session2', function () {
	dd(session('user'));
	//dd(session()->has('qwas'));
});*/