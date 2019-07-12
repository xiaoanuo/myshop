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

Route::get('/', function () {
    return view('welcome');
});
//跳转地址
Route::get('/student/index','StudentController@index');

//添加执行页面
Route::post('/student/do_add','StudentController@do_add');
//修改视图层
Route::get('/student/update','StudentController@update');
//修改执行页面
Route::post('/student/do_update','StudentController@do_update');
//删除
Route::get('/student/delete','StudentController@delete');

Route::get('/student/login','StudentController@login');

Route::post('/student/do_login','StudentController@do_login');

//调用中间件
Route::group(['middleware' => ['login']], function () {
    //添加学生信息
    Route::get('/student/add','StudentController@add');
});

Route::get('/login/register','Login\LoginController@register');
Route::get('/login/login','Login\LoginController@login');

Route::post('/login/add_register','Login\LoginController@add_register');
Route::post('/login/add_login','Login\LoginController@add_login');

Route::get('/index/index','index\IndexController@index');