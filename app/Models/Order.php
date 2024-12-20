<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'delivery_status',
        'status',
        'shipping_fee',
        'total_price',
        'total_discount_amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_detail():HasMany{
        return $this->hasMany(Order::class);
    }
}
