<?php

namespace App\Models;

class Order extends BaseModel
{
    protected $guarded = [];

    protected $with = ['products', 'client', 'address', 'PaymentMethod', 'DeliveryMethod'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function DeliveryMethod()
    {
        return $this->belongsTo(Delivry::class, 'delivery_id');
    }

    public function PaymentMethod()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')->withTrashed()->withPivot(['color_id', 'size_id', 'price', 'quantity', 'total']);
    }

    public function OrderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
