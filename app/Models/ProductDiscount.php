<?php

namespace App\Models;

class ProductDiscount extends BaseModel
{
    protected $table = 'product_discounts';

    protected $guarded = [];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
