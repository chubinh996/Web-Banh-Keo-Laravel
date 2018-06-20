<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\User;

class HoaDonController extends Controller
{
    public function getDanhSach(){
    	$user = User::all();
    	$bills = Bill::all();
    	return view('admin.bills.danhsach',compact('bills','user'));
    }

    public function getThem(){
    	return view('admin.bills.them',compact('bills'));
    }

    public function postThem(Request $req){
    	$this->validate($req,
    		[
    			'id_customer'=>'required|unique:bills,id_customer',
                'total'=>'required',
                'date_order'=>'required'
    		],
    		[
                'id_customer.required'=>'Bạn chưa nhập khách hàng',
    			'id_customer.unique'=>'Trùng id khách hàng',
                'total.required'=>'Bạn chưa nhập tổng tiền',
                'date_order.required'=>'Vui lòng chọn ngày đặt'
    		]);

    	$bills = new Bill();
        $bills->id_customer = $req->id_customer;
        $bills->total = $req->total;
        $bills->note = $req->note;
        $bills->created_at = $req->date_order;
        $bills->save();
        return redirect('admin/hoadon/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
    	$bills = Bill::find($id);
    	return view('admin.bills.sua',compact('bills'));
    }

    public function postSua(Request $req,$id){
    	$bills = Bill::find($id);
    	$this->validate($req,
    		[
                'id_customer'=>'required',
                'total'=>'required',
                'date_order'=>'required'
            ],
            [
                'id_customer.required'=>'Bạn chưa nhập khách hàng',
                'total.required'=>'Bạn chưa nhập tổng tiền',
                'date_order.required'=>'Vui lòng chọn ngày đặt'
            ]);
    	
    	$bills->id_customer = $req->id_customer;
        $bills->total = $req->total;
        $bills->note = $req->note;
        $bills->created_at = $req->date_order;
        $bills->save();
        return redirect('admin/hoadon/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
    	$bills = Bill::find($id);
    	$bills->delete();
    	return redirect('admin/hoadon/danhsach')->with('thongbao','Xóa thành công');
    }
}
