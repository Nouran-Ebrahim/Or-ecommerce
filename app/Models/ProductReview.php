<?php

namespace App\Models;

class ProductReview extends BaseModel
{
    protected $with = 'Client';

    protected $table = 'product_reviews';

    protected $guarded = [];

    public function Client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
