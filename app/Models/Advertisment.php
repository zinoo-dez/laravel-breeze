<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisment extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'location',
        'sorting',
        'link',
        'expired_at',
        'status',
    ];
}
