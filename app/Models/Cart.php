<?php

namespace App\Models;

class Cart extends BaseModel
{
    protected $guarded = [];

    protected $table = 'cart';

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    public function Size()
    {
        return $this->belongsTo(Size::class);
    }

    public function Color()
    {
        return $this->belongsTo(Color::class);
    }
}
