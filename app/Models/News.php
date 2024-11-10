<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_featured',
        'user_id',
        'title',
        'news_category_id',
        'content',
        'status',
    ];

    public function newscategory(){
        return $this->belongsTo(NewsCategory::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
