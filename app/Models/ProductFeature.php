<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    protected $fillable = [
        'product_id', 'icon', 'title', 'subtitle', 'descption', 'order'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
