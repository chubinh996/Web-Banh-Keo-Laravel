<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    //
	protected $table = "bill_detail";

	public function product(){
    	// 3 tham số : đường dân đến model sản phẩm , khóa ngoại , khóa chính.
		return $this->belongsTo('App\Product','id_product','id');
	}

	public function bill(){
		return $this->belongsTo('App\Bill','id_bill','id');
	}
}
