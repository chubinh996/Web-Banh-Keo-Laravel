<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = "type_products";

    public function product(){
    	// 3 tham số : đường dân đến model sản phẩm , khóa ngoại , khóa chính.
    	return $this->hasMany('App\Product','id_type','id');
    }
}
