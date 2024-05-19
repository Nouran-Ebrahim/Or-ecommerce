<?php

namespace App\Models;

class ProductImage extends BaseModel
{
    protected $table = 'product_images';

    protected $guarded = [];

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

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
