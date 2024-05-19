<?php

namespace App\Models;

class ProductFavourite extends BaseModel
{
    protected $table = 'product_favourites';

    protected $guarded = [];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }
}
