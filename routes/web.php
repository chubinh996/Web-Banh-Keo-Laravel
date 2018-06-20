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
	return view('form');
});

Route::post('/message/send', 
	[
		'uses' => 'FrontController@addFeedback',
		'as' => 'front.fb'
	]);

Route::get('hi/', function () {
	return view('welcome');
});

Route::get('hello','Hello@hello');

Route::get('trang-chu',[
	'as'=>'trangchu',
	'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaisp'
]);


Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);


Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);

Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);

Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);

Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);


Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioithieu'
]);

Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienhe'
]);

Route::get('blog-all',[
	'as'=>'blogall',
	'uses'=>'PageController@getBlogAll'
]);

Route::get('blog-detail/{id}',[
	'as'=>'blogdetail',
	'uses'=>'PageController@getBlogDetail'
]);

Route::get('dang-nhap',[
	'as'=>'dangnhap',
	'uses'=>'PageController@getDangNhap'
]);

Route::post('dang-nhap',[
	'as'=>'dangnhap',
	'uses'=>'PageController@postDangNhap'
]);

Route::get('dang-ky',[
	'as'=>'dangky',
	'uses'=>'PageController@getDangKy'
]);

Route::post('dang-ky',[
	'as'=>'dangky',
	'uses'=>'PageController@postDangKy'
]);

Route::get('dang-xuat',[
	'as'=>'dangxuat',
	'uses'=>'PageController@getDangXuat'
]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);

Route::get('admin/dang-nhap',[
	'as'=>'admin/dangnhap',
	'uses'=>'UserController@getDangnhapAdmin'
]);

Route::get('sendmail',[
	'as'=>'sendmail',
	'uses'=>'SendMailController@SendMailController'
]);

Route::post('send/ykien','UserController@postSendykien');

Route::get('admin/dangnhap','UserController@getDangnhapAdmin');
Route::post('admin/dangnhap','UserController@postDangnhapAdmin');
Route::get('admin/logout','UserController@getDangXuatAdmin');

//Tạo route cho admin
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'thongke'],function(){
		Route::get('danhsach','ThongKeController@getDanhSach');		
		Route::get('lietke','ThongKeController@getLietKe');	
		Route::post('lietke','ThongKeController@postLietKe');	
	});

	Route::group(['prefix'=>'theloai'],function(){
		Route::get('danhsach','TheLoaiController@getDanhSach');

		Route::get('sua/{id}','TheLoaiController@getSua');
		Route::post('sua/{id}','TheLoaiController@postSua');

		Route::get('them','TheLoaiController@getThem');
		//Route post-them để nhận dữ liệu từ form về gửi qua hàm getSua trong Controller
		Route::post('them','TheLoaiController@postThem');

		//
		Route::get('xoa/{id}','TheLoaiController@getXoa');
	});
	Route::group(['prefix'=>'sanpham'],function(){
		Route::get('danhsach','SanPhamController@getDanhSach');

		Route::get('sua/{id}','SanPhamController@getSua');
		Route::post('sua/{id}','SanPhamController@postSua');

		Route::get('them','SanPhamController@getThem');
		//Route post-them để nhận dữ liệu từ form về gửi qua hàm getSua trong Controller
		Route::post('them','SanPhamController@postThem');

		//
		Route::get('xoa/{id}','SanPhamController@getXoa');
	});
	Route::group(['prefix'=>'tintuc'],function(){
		Route::get('danhsach','TinTucController@getDanhSach');

		Route::get('them','TinTucController@getThem');
		Route::post('them','TinTucController@postThem');

		Route::get('sua/{id}','TinTucController@getSua');
		Route::post('sua/{id}','TinTucController@postSua');

		Route::get('xoa/{id}','TinTucController@getXoa');
	});

	Route::group(['prefix'=>'hoadon'],function(){
		Route::get('danhsach','HoaDonController@getDanhSach');

		Route::get('them','HoaDonController@getThem');
		Route::post('them','HoaDonController@postThem');

		Route::get('sua/{id}','HoaDonController@getSua');
		Route::post('sua/{id}','HoaDonController@postSua');

		Route::get('xoa/{id}','HoaDonController@getXoa');
	});

	Route::group(['prefix'=>'chitiethoadon'],function(){
		Route::get('danhsach','ChiTietHoaDonController@getDanhSach');

		Route::get('them','ChiTietHoaDonController@getThem');
		Route::post('them','ChiTietHoaDonController@postThem');

		Route::get('sua/{id}','ChiTietHoaDonController@getSua');
		Route::post('sua/{id}','ChiTietHoaDonController@postSua');

		Route::get('xoa/{id}','ChiTietHoaDonController@getXoa');
	});

	Route::group(['prefix'=>'user'],function(){
		Route::get('danhsach','UserController@getDanhSach');

		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');

		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');

		Route::get('xoa/{id}','UserController@getXoa');
	});

	Route::group(['prefix'=>'ajax'],function(){
		Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
	});

	Route::group(['prefix'=>'comment'],function(){
		Route::get('xoa/{id}/{idTinTuc}','CommentController@getXoa');
	});
	
});
