<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;

class TheLoaiController extends Controller
{
    public function getDanhSach(){
    	$theloai = ProductType::all();
    	return view('admin.theloai.danhsach',compact('theloai'));
    }

    public function getThem(){
    	return view('admin.theloai.them',compact('theloai'));
    }

    public function postThem(Request $req){
    	$this->validate($req,
    		[
    			'name'=>'required|unique:type_products,name'
    		],
    		[
    			'name.required'=>'Bạn chưa nhập tên thể loại',
                'name.unique'=>'Tên thể loại đã tồn tại'
    		]);

    	$theloai = new ProductType();
        $theloai->name = $req->name;
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
    	$theloai = ProductType::find($id);
    	return view('admin.theloai.sua',compact('theloai'));
    }

    public function postSua(Request $req,$id){
    	$theloai = ProductType::find($id);
    	$this->validate($req,
    		[
    			'name'=>'required'
    		],
    		[
    			'name.required'=>'Bạn chưa nhập tên thể loại'
    			
    		]);
    	
    	$theloai->name = $req->name;
        $theloai->save();
        return redirect('admin/theloai/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
    	$theloai = ProductType::find($id);
    	$theloai->delete();
    	return redirect('admin/theloai/danhsach')->with('thongbao','Xóa thành công');
    }
}
