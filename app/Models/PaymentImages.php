<?php

namespace App\Models;

class PaymentImages extends BaseModel
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($Model) {
            if ($Model->image) {
                Upload::deleteImage($Model->image);
            }
        });
    }
}
