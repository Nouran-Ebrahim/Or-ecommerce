<?php

namespace App\Models;

class Coupon extends BaseModel
{
    protected $guarded = [];

    public function Products()
    {
        return $this->belongsToMany(Product::class, 'coupon_products');
    }
}
