<?php

namespace App\Models;

class Slider extends BaseModel
{
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($Model) {
            if ($Model->image) {
                Upload::deleteImage($Model->image);
            }
        });
    }
}
