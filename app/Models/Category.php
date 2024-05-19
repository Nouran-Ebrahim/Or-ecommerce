<?php

namespace App\Models;

class Category extends BaseModel
{
    protected $guarded = [];

    protected $table = 'categories';
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public static function shiftChild($cat_id){
        return Category::where('id',$cat_id)->update(['is_parent'=>1]);
    }
}
