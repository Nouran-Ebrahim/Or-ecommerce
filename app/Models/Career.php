<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends BaseModel
{
    protected $guarded = [];
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}
