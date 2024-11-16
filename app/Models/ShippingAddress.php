<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShippingAddress extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'contact_name',
        'contact_phone',
        'postal_code',
        'email',
        'address',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order_detail():HasMany{
        return $this->hasMany(OrderDetail::class);
    }
}
