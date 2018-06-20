<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;

class SanPhamController extends Controller
{
	public function getDanhSach(){
		$sanpham = Product::all();
		return view('admin.products.danhsach',compact('sanpham'));
	}

	public function getThem(){
		$theloai = ProductType::all();
		return view('admin.products.them',compact('theloai'));
	}

	public function postThem(Request $req){
		$this->validate($req,
			[
				'name'=>'required|unique:products,name',
				'theloai'=>'required',
				'unit_price'=>'required'
			],
			[
				'name.required'=>'Bạn chưa nhập tên sản phẩm',
				'name.unique'=>'Tên sản phẩm đã tồn tại',
				'theloai.required'=>'Bạn chưa chọn thể loại',
				'unit_price.required'=>'Bạn chưa nhập giá'
			]);

		$sanpham = new Product();

		$sanpham->name = $req->name;
		$sanpham->id_type = $req->theloai;
		$sanpham->short_description = $req->short_description;
		$sanpham->description = $req->description;
		$sanpham->unit_price = $req->unit_price;
		$sanpham->sale_price = $req->sale_price;
		$sanpham->promotion_price = $req->promotion_price;
		// $sanpham->image = $req->image;

		if($req->hasFile('image'))
		{
			$file = $req->file('image');

			$name = $file->getClientOriginalName();
			//$Hinh = str_random(4)."_".$name;
			// while(file_exists("source/image/product/".$Hinh))
			// {
			// 	$Hinh = str_random(4)."_".$name;
			// }
			$file->move("source/image/product",$name);
			$sanpham->image = $name;
		}
		else
		{
			$sanpham->image = " ";
		}


		$sanpham->new = $req->new;
		$sanpham->save();

		return redirect('admin/sanpham/them')->with('thongbao','Thêm thành công');
	}

	public function getSua($id){
		$theloai = ProductType::all();
		$sanpham = Product::find($id);
		return view('admin.products.sua',compact('sanpham','theloai'));
	}

	public function postSua(Request $req,$id){
		$sanpham = Product::find($id);
		$this->validate($req,
			[
				'name'=>'required',
				'theloai'=>'required',
				'unit_price'=>'required'
			],
			[
				'name.required'=>'Bạn chưa nhập tên sản phẩm',
				'theloai.required'=>'Bạn chưa chọn thể loại',
				'unit_price.required'=>'Bạn chưa nhập giá'
			]);
		$sanpham->name = $req->name;
		$sanpham->id_type = $req->theloai;
		$sanpham->short_description = $req->short_description;
		$sanpham->description = $req->description;
		$sanpham->unit_price = $req->unit_price;
		$sanpham->sale_price = $req->sale_price;
		$sanpham->promotion_price = $req->promotion_price;
		// $sanpham->image = $req->image;
		$sanpham->new = $req->new;

		if($req->hasFile('image'))
		{
			$file = $req->file('image');
			$name = $file->getClientOriginalName();
			//$Hinh = str_random(4)."_".$name;
			// while(file_exists("source/image/product/".$Hinh))
			// {
			// 	$Hinh = str_random(4)."_".$name;
			// }
			$file->move("source/image/product",$name);
			// unlink("source/image/product".$sanpham->image);
			$sanpham->image = $name;
		}
		
		$sanpham->save();
		return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Sửa thành công');
	}

	public function getXoa($id){
		$sanpham = Product::find($id);
		$sanpham->delete();
		return redirect('admin/sanpham/danhsach')->with('thongbao','Xóa thành công');
	}
}
