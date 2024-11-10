<?php
namespace App\Enums;

enum DeliveryStatus:string{
    case Delivery = 'delivery';
    case Pickup = 'pickup';
}
