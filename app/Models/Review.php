<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'rating', 'comment'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function images(){
        return $this->hasMany(ReviewImage::class);
    }

    public function reactions(){
        return $this->hasMany(ReviewReaction::class);
    }

    public function userReaction($userId = null){
        $userId = $userId ?? auth()->id();
        if (!$userId) return null;

        return $this->reactions()->where('user_id', $userId)->first();
    }
}
