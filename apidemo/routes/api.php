<?php

use Illuminate\Http\Request;
use App\Article;

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

//Route::middleware('auth:api')
//    ->get('/user', function (Request $request) {
//        return $request->user();
//    });
//
//Route::group(['middleware' => 'auth:api'], function() {
//    Route::get('articles', 'ArticleController@index');
//    Route::get('articles/{article}', 'ArticleController@show');
//    Route::post('articles', 'ArticleController@store');
//    Route::put('articles/{article}', 'ArticleController@update');
//    Route::delete('articles/{article}', 'ArticleController@delete');
//});
//Route::post('register', 'Auth\RegisterController@register');
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout');
$api = app('Dingo\Api\Routing\Router');

//$api->version('v1', function($api) {
//    $api->get('version', function() {
//        return response('this is version v1');
//    });
//    // 短信验证码
//    $api->post('verificationCodes', 'VerificationCodesController@store')
//        ->name('api.verificationCodes.store');
//// 用户注册
//    $api->post('users', 'UsersController@store')
//        ->name('api.users.store');
//});
$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api'
], function($api) {
    // 短信验证码
    $api->post('verificationCodes', 'VerificationCodesController@store')
        ->name('api.verificationCodes.store');
// 用户注册
    $api->post('users', 'UsersController@store')
        ->name('api.users.store');
    //图片验证码
    $api->post('captchas', 'CaptchasController@store')
        ->name('api.captchas.store');
});

$api->version('v2', function($api) {
    $api->get('version', function() {
        return response('this is version v2');
    });
});