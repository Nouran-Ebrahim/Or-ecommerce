<?php

namespace App\Models;

class Country extends BaseModel
{
    protected $guarded = [];

    protected $withCount = ['Regions'];

    public function Regions()
    {
        return $this->hasMany(Region::class);
    }

    protected $appends = ['currancy_code'];

    public function getCurrancyCodeAttribute()
    {
        return $this['currancy_code_'.lang()];
    }
}
