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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('/login', 'Api\AuthController@login');
//username, password

Route::post('/register', 'Api\AuthController@register');
//username, password, fullname, usia, jk(0,1) (0 = laki-laki, 1 = perempuan)

Route::post('/update/{id}', 'Api\AuthController@update');
//fullname, usia, jk(0,1) (0 = laki-laki, 1 = perempuan)

Route::post('/update-password', 'Api\AuthController@update_password');
//password, usia, username

Route::get('/articles/all', 'Api\ArticleController@all');

Route::get('/articles/{category}', 'Api\ArticleController@getByCategory');
//category = 1, 2, 3

Route::post('/post-question/{id}', 'Api\QAController@post_question');
//question, ditujukan (Ustadz, Dokter)

Route::get('/get-question-by-user-id/{id}', 'Api\QAController@get_question_by_user_id');