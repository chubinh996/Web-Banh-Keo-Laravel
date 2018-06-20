<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class TinTucController extends Controller
{
	public function getDanhSach(){
		$tintuc = News::all();
		return view('admin.news.danhsach',compact('tintuc'));
	}

	public function getThem(){
		$tintuc = News::all();
		return view('admin.news.them',compact('tintuc'));
	}

	public function postThem(Request $req){
		$this->validate($req,
			[
				'title'=>'required|unique:news,title',
				'content'=>'required',
				'short_description'=>'required'
			],
			[
				'title.required'=>'Bạn chưa nhập tiêu đề',
				'title.unique'=>'Tên tiêu đề đã tồn tại',
				'content.required'=>'Bạn chưa nhập nội dung',
				'short_description.required'=>'Bạn chưa nhập mô tả'
			]);

		$tintuc = new News();

		$tintuc->title = $req->title;
		$tintuc->content = $req->content;
		$tintuc->short_description = $req->short_description;
		
		if($req->hasFile('image'))
		{
			$file = $req->file('image');

			$title = $file->getClientOriginalName();
			
			$file->move("source/image/blog",$title);
			$tintuc->image = $title;
		}
		else
		{
			$tintuc->image = " ";
		}

		$tintuc->save();

		return redirect('admin/tintuc/them')->with('thongbao','Thêm thành công');
	}

	public function getSua($id){
		
		$tintuc = News::find($id);
		return view('admin.news.sua',compact('tintuc'));
	}

	public function postSua(Request $req,$id){
		$tintuc = News::find($id);
		$this->validate($req,
			[
				'title'=>'required|unique:news,title',
				'content'=>'required',
				'short_description'=>'required'
			],
			[
				'title.required'=>'Bạn chưa nhập tiêu đề',
				'title.unique'=>'Tên tiêu đề đã tồn tại',
				'content.required'=>'Bạn chưa nhập nội dung',
				'short_description.required'=>'Bạn chưa nhập mô tả'
			]);
		$tintuc->title = $req->title;
		$tintuc->content = $req->content;
		$tintuc->short_description = $req->short_description;
		

		if($req->hasFile('image'))
		{
			$file = $req->file('image');
			$title = $file->getClientOriginalName();
			
			$file->move("source/image/blog",$title);
			
			$tintuc->image = $title;
		}
		
		$tintuc->save();
		return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sửa thành công');
	}

	public function getXoa($id){
		$tintuc = News::find($id);
		$tintuc->delete();
		return redirect('admin/tintuc/danhsach')->with('thongbao','Xóa thành công');
	}
}
