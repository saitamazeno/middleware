<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

//Gán ràng buộc vào định tuyến
// Route::get('admin/{age}', function () {
//     return view('admin');
// })->middleware(('CheckAge'));


//Gọi middleware trên controller
// Route::get('admin/{age}', 'AdminController@index');
// Route::get('admin/show/{age}', 'AdminController@show');


//phân quyền sd middleware
//Admintrator => admin/dashboard, Subscriber => /
//users=>Auth, roles=>id,name

//phân quyền
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Gán ràng buộc vào định tuyến
// Route::get('admin/dashboard', 'AdminController@dashboard')->middleware('auth','CheckRole');
// middleware có tham số
// Route::get('admin/dashboard', 'AdminController@dashboard')->middleware('CheckRole:subcriber');
//Xử lý middleware theo nhóm
Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', 'AdminController@dashboard');
    //danh sách route cùng áp dụng cái auth này
});
