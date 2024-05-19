<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends BaseModel
{
    protected $guarded = [];
    public function applicants()
    {
        return $this->belongsTo(Career::class);
    }
}
