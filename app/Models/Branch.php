<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    public function Images()
    {
        return $this->hasMany(BranchImage::class);
    }

    public function Country()
    {
        return $this->belongsTo(Country::class);
    }
    public function Region()
    {
        return $this->belongsTo(Region::class);
    }

}
