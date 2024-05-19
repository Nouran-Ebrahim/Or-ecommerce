<?php

namespace App\Models;

class Delivry extends BaseModel
{
    protected $guarded = [];

    public function discounts()
    {
        return $this->morphMany(Discount::class, 'discountable');
    }
}
