<?php

namespace App\Models;

use App\Traits\Status;
use App\Traits\Translate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory, Status, Translate;
}
