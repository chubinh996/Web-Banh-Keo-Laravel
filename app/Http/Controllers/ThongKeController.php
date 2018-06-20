<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Product;
use App\ProductType;
use App\BillDetail;
use App\News;
use App\User;
use App\ListOfDay;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    public function getDanhSach(){
        $theloai = ProductType::all();
        $sanpham = Product::all();
        $tintuc = News::all();
        $hoadon = Bill::all();
        $cthoadon = BillDetail::all();
        $user = User::all();
        return view('admin.thongke.danhsach',compact('theloai','sanpham','tintuc','hoadon','cthoadon','user'));
    }

    public function getLietKe(){
        $theloai = ProductType::all();
        $sanpham = Product::all();
        $tintuc = News::all();
        $hoadon = Bill::all();
        $cthoadon = BillDetail::all();
        $user = User::all();
        $sumqty = BillDetail::all()->sum('quantity');
        $sumthunhap = BillDetail::all()->sum('unit_price');
        // $sumqty = BillDetail::all()->sum('quantity');

        $orderss = DB::select("select sum(bill_detail.unit_price*bill_detail.quantity) as totals from bill_detail"); 

        $orders = DB::select("select sum(products.unit_price) as total from products,bill_detail where products.id = bill_detail.id_product"); 

        // select sum(products.unit_price) from products,bill_detail where products.id = bill_detail.id_product;

        return view('admin.thongke.lietke',compact('theloai','sanpham','tintuc','hoadon','cthoadon','user','sumqty','sumthunhap','orders','orderss'));
    }

    public function postLietKe(Request $req){
        $ngaybd = $req->fromday;
        $ngaykt = $req->today.' 00:00:00';

        // $tonguser = "select sum(id_customer) as tonguser from bills where bills.created_at >= ".$ngaybd." and bills.created_at <= '".$ngaykt."' ";
        // $tonguser1 = DB::select($tonguser);

        // $tongtien = "select sum(total) as tongtien from bills where bills.created_at >= ".$ngaybd." and bills.created_at <= '".$ngaykt."' ";
        // $tongtien1 = DB::select($tongtien);

        // $thongke = new ListOfDay();
        // $thongke->date = $ngaybd;
        // $thongke->total_customer = $tonguser1[0]->tonguser;
        // $thongke->total_money_bill_ordered = $tongtien1[0]->tongtien;
        // $thongke->total_product_ordered = 0;
        // $thongke->bill_ordered = 0;
        // $thongke->save();


        $qty = "select sum(quantity) as total from bill_detail where created_at >= ".$ngaybd." and created_at <= '".$ngaykt."' ";

        $giaban = "select sum(bill_detail.unit_price*bill_detail.quantity) as totals from bill_detail where created_at >= ".$ngaybd." and created_at <= '".$ngaykt."' ";

        $giagoc = "select sum(products.unit_price) as totalss from products,bill_detail where products.id = bill_detail.id_product and bill_detail.created_at >= ".$ngaybd." and bill_detail.created_at <= '".$ngaykt."' ";

        $date = DB::select($qty); 
        $date2 = DB::select($giaban); 
        $date3 = DB::select($giagoc); 

        return view('admin.thongke.tong',compact('date','date2','date3'));
    }
}
