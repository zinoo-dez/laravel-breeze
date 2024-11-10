<?php
namespace App\Enums;
enum OrderStatus:string{
    case Pending = 'pending';
    case Delivery='delivery';
    case Cancel = 'cancel';

    case Complete = 'complete';
    case Shipping = 'shipping';
    case Mixed = 'mixed';
}
