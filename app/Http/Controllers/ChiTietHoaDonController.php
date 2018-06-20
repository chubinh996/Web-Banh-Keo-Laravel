<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillDetail;
use App\Product;

class ChiTietHoaDonController extends Controller
{
    public function getDanhSach(){
    	$hoadon = Bill::all();
		$cthoadon = BillDetail::all();
		return view('admin.bill_detail.danhsach',compact('hoadon','cthoadon'));
	}

	public function getThem(){
		$cthoadon = BillDetail::all();
		return view('admin.bill_detail.them',compact('cthoadon'));
	}

	public function postThem(Request $req){
		$this->validate($req,
			[
				'id_bill'=>'required',
				'id_product'=>'required',
				'unit_price'=>'required',
				'quantity'=>'required'
			],
			[
				'id_bill.required'=>'Bạn chưa nhập mã hóa đơn',
				'id_product.required'=>'Bạn chưa nhập mã sản phẩm',
				'quantity.required'=>'Bạn chưa nhập số lượng',
				'unit_price.required'=>'Bạn chưa nhập giá'
			]);

		$cthoadon = new BillDetail();

		$cthoadon->id_bill = $req->id_bill;
		$cthoadon->id_product = $req->id_product;
		$cthoadon->quantity = $req->quantity;		
		$cthoadon->unit_price = $req->unit_price;
		
		$cthoadon->save();

		return redirect('admin/chitiethoadon/them')->with('thongbao','Thêm thành công');
	}

	public function getSua($id){
		$bill = Bill::all();
		$product = Product::all();
		$cthoadon = BillDetail::find($id);
		return view('admin.bill_detail.sua',compact('bill','product','cthoadon'));
	}

	public function postSua(Request $req,$id){
		$cthoadon = BillDetail::find($id);
		$this->validate($req,
			[
				'id_bill'=>'required',
				'id_product'=>'required',
				'unit_price'=>'required',
				'quantity'=>'required'
			],
			[
				'id_bill.required'=>'Bạn chưa nhập mã hóa đơn',
				'id_product.required'=>'Bạn chưa nhập mã sản phẩm',
				'quantity.required'=>'Bạn chưa nhập số lượng',
				'unit_price.required'=>'Bạn chưa nhập giá'
			]);
		$cthoadon->id_bill = $req->id_bill;
		$cthoadon->id_product = $req->id_product;
		$cthoadon->quantity = $req->quantity;		
		$cthoadon->unit_price = $req->unit_price;

		$cthoadon->save();
		return redirect('admin/chitiethoadon/sua/'.$id)->with('thongbao','Sửa thành công');
	}

	public function getXoa($id){
		$cthoadon = BillDetail::find($id);
		$cthoadon->delete();
		return redirect('admin/chitiethoadon/danhsach')->with('thongbao','Xóa thành công');
	}
}
