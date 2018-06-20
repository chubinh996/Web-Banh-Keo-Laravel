<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use App\News;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Hash;
use Auth;

class PageController extends Controller
{
    //
    public function getIndex(){
    	$slide  = Slide::all();
        $new_product = Product::where('new',1)->paginate(4);
        $type_product = ProductType::all();
        $news = News::where('id','<>',0)->paginate(4);
        
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai','news','type_product'));
    }

    public function getLoaisp($type){
        $sp_theoloai = Product::where('id_type',$type)->get();
        $type_product = ProductType::all();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai = ProductType::all();
        $loaisp = ProductType::where('id',$type)->first();
        return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loaisp','type_product'));
    }

    public function getChitiet(Request $req){
        //cách 2 để lấy id truyền từ route qua
        $sanpham = Product::where('id',$req->id)->first();
        $new_product = Product::where('new',1)->paginate(4);
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(3);

        $sp_ngon = Product::where('promotion_price','<>',0)->paginate(4);
        return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu','new_product','sp_ngon'));
    }

    public function getAddtoCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items) > 0){
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout(){
        return view('page.dat_hang');
    }

    public function postCheckout(Request $req){
        $cart = Session::get('cart');
        $customer = new User;

        $bill = new Bill;
        $bill->id_customer = Auth::user()->id;
        $bill->total = $cart->totalPrice*$req->qty;  
        $bill->note=$req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $req->qty;
            $bill_detail->unit_price = $value['price']/$value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');

        return view('page.dathang_thanhcong')->with('thongbao','Đặt hàng thành công !');       
    }

    public function getGioithieu(){
        return view('page.gioithieu');
    }

    public function getLienhe(){
    	return view('page.lienhe');
    }

    public function getBlogAll(){
        $blogall = News::where('id','<>','0')->paginate(8);
        return view('page.blogall',compact('blogall'));
    }

    public function getBlogDetail(Request $req){
        $blogdetail = News::where('id',$req->id)->get();
        return view('page.blogdetail',compact('blogdetail'));
    }

    public function getDangKy(){
        return view('page.DangKy');
    }

    public function postDangKy(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email chưa đúng định dạng',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.required'=>'Vui lòng nhập lại mật khẩu',
                're_password.same'=>'Mật khẩu chưa giống',
                'password.min'=>'Mật khẩu có ít nhất 6 ký tự và nhiều nhất 20 ký tự',
                'password.max'=>'Mật khẩu có ít nhất 6 ký tự và nhiều nhất 20 ký tự',
                'fullname.required'=>'Vui lòng nhập Họ & Tên'

            ]);
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->birthday = $req->birthday;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->quyen = "2";
        $user->save();
        return redirect()->back()->with('thanhcong','Đăng ký thành công');
    }

    public function getDangNhap(){
        return view('page.DangNhap');
    }

    public function postDangNhap(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'               
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email chưa đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu có ít nhất 6 ký tự và nhiều nhất 20 ký tự',
                'password.max'=>'Mật khẩu có ít nhất 6 ký tự và nhiều nhất 20 ký tự'              
            ]);
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials))
            {
                Session::forget('cart');
                return redirect()->route('trangchu');
                // ->with(['flag'=>'success','message'=>'Đăng nhập thành công'])

            }
            else{
                return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
            }
        }

        public function getDangXuat(){
            Auth::logout();
            return redirect()->route('trangchu');
        }

        public function getSearch(Request $req){
            $count_product = Product::where('name','like','%'.$req->search.'%')->orWhere('unit_price',$req->search)->get();
            $product = Product::where('name','like','%'.$req->search.'%')->orWhere('unit_price',$req->search)->paginate(12);
            return view('page.search',compact('product','count_product'));
        }
    }
