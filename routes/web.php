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
Route::get('/',['as'=>'trangchu','uses'=>'MyController@getIndex']);
Route::get('index',['as'=>'trangchu','uses'=>'MyController@getIndex']);

Route::get('chi-tiet-san-pham/{id}',['as'=>'chitietsanpham','uses'=>'MyController@getSanpham']);

Route::get('lien-he',['as'=>'lienhe','uses'=>'MyController@lienhe']);
Route::get('all',['as'=>'show','uses'=>'MyController@all']);

Route::post('thanh-toan',['as'=>'thanhtoan','uses'=>'MyController@thanhtoan']);
Route::get('payment',['as'=>'payment','uses'=>'MyController@payment']);
Route::post('/ship','MyController@ship');

Route::get('loai-san-pham/{req}',['as'=>'loaisanpham','uses'=>'MyController@danhmuc']);

Route::get('tin-tuc',['as'=>'tintuc','uses'=>'MyController@tintuc']);

//giỏ hàng
Route::post('/update-cart-quantity','MyController@update_cart_quantity');
Route::post('/save-cart','MyController@save_cart');
Route::get('/show-cart',['as'=>'showcart','uses'=>'MyController@show_cart']);
Route::get('/delete-to-cart/{rowId}','MyController@delete_to_cart');


Route::get('login',['as'=>'login','uses'=>'MyController@login']);

Route::get('register',['as'=>'register','uses'=>'MyController@register']);
Route::get('resetpw',['as'=>'resetpw','uses'=>'MyController@resetpw']);
Route::get('/link-reset/{token}',['as'=>'resetLink','uses'=>'MyController@linkResetToken']);

Route::post('/postlogin','MyController@kiemtra');
Route::post('/postresetpw','MyController@postresetpass');
Route::post('/postnewpw','MyController@postnewpass');
Route::get('dangxuat',['as'=>'dangxuat','uses'=>'MyController@dangxuat']);
Route::get('search',['as'=>'search','uses'=>'MyController@search']);
Route::get('/lich-su',['as'=>'lichsu','uses'=>'MyController@lichsu']);
Route::post('/huy','MyController@huy');


//Admin Backend
Route::get('/admin', 'AdminController@getIndex');
Route::get('/dashboard','AdminController@showDashboard');
Route::post('/admin-dashboard','AdminController@login');
Route::get('/logout','AdminController@logout');
Route::get('/chitiethoadon/{id}',['as'=>'chitiethoadon','uses'=>'DonhangController@chitiet']);

Route::post('tim-kiem','MyController@timkiem');

//Modulde
Route::get('/danh-sach-hang-san-xuat','HangsxController@dshsx');


Route::get('/add-hang-san-xuat','HangsxController@themhsx');
Route::post('/save-hang-san-xuat','HangsxController@save_hsx');

Route::get('/delete-hang-san-xuat/{id_hang}','HangsxController@delete_hangsx');

Route::get('/danh-sach-don-hang' ,'DonhangController@dsdh');
Route::get('/edit-hang-san-xuat/{id_hang}','HangsxController@edit_hangsx');
Route::post('/update-hang-san-xuat/{id_hang}','HangsxController@update_hangsx');
Route::get('/edit-san-pham/{id}',['as'=>'editsanpham','uses'=>'SanphamController@edit']);

Route::get('/danh-sach-san-pham','SanphamController@dssanpham');
Route::get('/them-san-pham','SanphamController@addsanpham');
Route::get('/danh-sach-user','TaikhoanController@danhsachuser');
Route::post('/save-user','MyController@postreg');
Route::post('/save-san-pham','SanphamController@savesp');
Route::post('/sua-san-pham','SanphamController@suasp');
Route::post('/trang-thai','DonhangController@trangthai');
