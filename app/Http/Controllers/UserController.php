<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
//sử dụng được model thể loại
use App\User;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function getDangnhapAdmin(){
		return view('admin.login');
	} 

	public function postDangnhapAdmin(Request $req){
		$this->validate($req,
			[
				'email'=>'required',
				'password'=>'required'
			],
			[
				'email.required'=>'Bạn chưa nhập email',
				'password.required'=>'Bạn chưa nhập mật khẩu'
			]);
		
		if(Auth::attempt(['email'=>$req->email,'password'=>$req->password]))
			{
				return redirect('admin/thongke/danhsach');
			}
			else
			{
				return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công !');
			}
	}

	public function getDangXuatAdmin()
	{
		Auth::logout();
		return redirect('admin/dangnhap'); 
	}

	public function getDanhSach(){
		$user = User::all();
		return view('admin.customer.danhsach',compact('user'));
	}

	public function getThem(){
		$user = User::all();
		return view('admin.customer.them',compact('user'));
	}

	public function postThem(Request $req){
		$this->validate($req,
			[
				'email'=>'required|unique:users,email',
				'password'=>'required',
				'birthday'=>'required'
			],
			[
				'email.required'=>'Bạn chưa nhập email',
				'email.unique'=>'Email đã tồn tại',
				'password.required'=>'Bạn chưa nhập mật khẩu',
				'birthday.required'=>'Bạn chưa nhập ngày sinh'
			]);

		$user = new User();

		$user->full_name = $req->full_name;
		$user->email = $req->email;
		$user->password = $req->password;
		$user->phone = $req->phone;
		$user->address = $req->address;
		$user->birthday = $req->birthday;
		
		$user->save();

		return redirect('admin/user/them')->with('thongbao','Thêm thành công');
	}

	public function getSua($id){
		
		$user = User::find($id);
		return view('admin.customer.sua',compact('user'));
	}

	public function postSua(Request $req,$id){
		$user = User::find($id);
		$this->validate($req,
			[
				'email'=>'required|unique:users,email',
				'password'=>'required',
				'birthday'=>'required'
			],
			[
				'email.required'=>'Bạn chưa nhập email',
				'email.unique'=>'Email đã tồn tại',
				'password.required'=>'Bạn chưa nhập mật khẩu',
				'birthday.required'=>'Bạn chưa nhập ngày sinh'
			]);
		$user->full_name = $req->full_name;
		$user->email = $req->email;
		$user->password = $req->password;
		$user->phone = $req->phone;
		$user->address = $req->address;
		$user->birthday = $req->birthday;
		
		$user->save();
		return redirect('admin/user/sua/'.$id)->with('thongbao','Sửa thành công');
	}

	public function getXoa($id){
		$user = User::find($id);
		$user->delete();
		return redirect('admin/user/danhsach')->with('thongbao','Xóa thành công');
	}

	public function postSendykien(Request $req)
	{	
		$name = $req->name;
		$email = $req->email;
		$tieude = $req->tieude;
		$noidung = $req->noidung;

		//get email to send-----------------------------------
		// $emailto = 'chubinh996@gmail.com';		

		// //Send email
		// $headers = "From: " . $email . "\r\n";
		// $headers .= "Reply-To: ". $email . "\r\n";
		// $headers .= "CC: test@gmail.com";
		// $headers .= "MIME-Version: 1.0\r\n";
		// $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		// $to_admin      = $emailto;
		// $subject = 'Góp Ý Kiến !';
		// $message_admin = nl2br("Xin chào, \n Một khách hàng vừa góp ý kiến đến cửa hàng Candy Shop như thế này :
		// 	</a> \n Thông tin :\nName : ".$name.
		// 	"\nEmail : ".$email.
		// 	"\nTiêu đề : ".$tieude.
		// 	"\nNội dung : ".$noidung);
		// mail($to_admin, $subject, $message_admin, $headers);

	}
}
