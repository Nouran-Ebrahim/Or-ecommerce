<?php

namespace App\Models;

class Color extends BaseModel
{
    protected $guarded = [];
    public function Gallery()
    {
        return $this->hasMany(ProductGallery::class);
    }
    public function Header()
    {
        return $this->hasMany(ProductHeader::class);
    }
}
