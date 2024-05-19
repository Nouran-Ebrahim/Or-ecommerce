<?php

namespace App\Traits;

use App\Functions\Upload;

trait DeleteImage
{
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
