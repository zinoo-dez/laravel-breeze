<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'order_id',
        'product_id',
        'shipping_address_id',
        'status',
        'qty',
        'price',
        'discount_type',
        'discount_value',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function products():HasMany{
        return $this->hasMany(Product::class);
    }

    public function shipping_address(){
        return $this->belongsTo(ShippingAddress::class);
    }

}
