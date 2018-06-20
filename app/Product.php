<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";

    public function product_type(){
    	// 3 tham số : đường dân đến model loại sản phẩm , khóa ngoại , khóa chính của bảng sp.
    	return $this->belongsTo('App\ProductType','id_type','id');
    }

    public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_product','id');
    }
}
