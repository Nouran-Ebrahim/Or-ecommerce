<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends BaseModel
{
    use SoftDeletes;

    protected $guarded = [];

    protected $with = ['Images'];

    public function Rates()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function Categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }
    public function Gallery()
    {
        return $this->hasMany(ProductGallery::class);
    }
    public function Header()
    {
        return $this->hasMany(ProductHeader::class);
    }
    public function Orders()
    {
        return $this->belongsToMany(Order::class, 'order_products');
    }

    public function Sizes()
    {
        return $this->belongsToMany(Size::class, 'product_size');
    }

    public function Colors()
    {
        return $this->belongsToMany(Color::class, 'product_color');
    }

    public function RandomImage()
    {
        return $this->Images->where('main', 1)->count() > 0 ? $this->Images->where('main', 1)->first()->image : $this->Images->first()?->image;
    }

    public function HasDiscount()
    {
        return $this->from <= now() && $this->to >= now();
    }

    public static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            $model->arrangement = $model->id;
            $model->save();
        });
    }

    public function Images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('id', 'desc');
    }

    public function CalcPrice()
    {
        if ($this->discount && $this->from < now() && $this->to > now()) {
            return number_format(($this->price - ($this->price / 100 * $this->discount)) * Country()->currancy_value, Country()->decimals, '.', '');
        } else {
            return number_format($this->price * Country()->currancy_value, Country()->decimals, '.', '');
        }
    }

    public function Price()
    {
        return number_format($this->price * Country()->currancy_value, Country()->decimals, '.', '');
    }


}
