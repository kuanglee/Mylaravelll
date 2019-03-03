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

Route::get('admin/dangnhap',function(){
  return view('dangnhap');
});
Route::post('admin/login','UserController@login')->name('login');
Route::get('admin/logout','UserController@logout');
Route::get('thu', function(){
  return view('thanhcong');
});

Route::get('thu',function(){
  return view('admin.user.danhsach');
});
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
      Route::group(['prefix'=>'user'],function(){
        Route::get('danhsach', 'UserController@getDanhSach');

        Route::get('sua/{id}','UserController@getSua');
        Route::post('sua/{id}','UserController@postSua');

        Route::get('them','UserController@getThem');
        Route::post('them','UserController@postThem');

        Route::get('xoa/{id}','UserController@getXoa');
      });
      Route::group(['prefix'=>'theloai'],function(){
        Route::get('danhsach','TheLoaiController@getDanhSach');

        Route::get('them','TheLoaiController@getThemTheLoai');
        Route::post('them','TheLoaiController@postThemTheLoai');

        Route::get('sua/{id}','TheLoaiController@getSuaTheLoai');
        Route::post('sua/{id}','TheLoaiController@postSuaTheLoai');

        Route::get('xoa/{id}','TheLoaiController@getXoaTheLoai');
      });

      Route::group(['prefix'=>'tintuc'],function(){
        Route::get('danhsach','TinTucController@getDanhSach');

        Route::get('them','TinTucController@getThemTinTuc');
        Route::post('them','TinTucController@postThemTinTuc');

        Route::get('sua/{id}','TinTucController@getSuaTinTuc');
        Route::post('sua/{id}','TinTucController@postSuaTinTuc');

        Route::get('xoa/{id}','TinTucController@getXoaTinTuc');
      });
});
