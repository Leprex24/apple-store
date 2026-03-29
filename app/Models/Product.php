<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'slug', 'description', 'price', 'original_price', 'is_on_sale', 'discount_percentage', 'stock', 'is_featured', 'is_new'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->hasMany(ProductImage::class)->where('order', '>', 0)->orderBy('order');
    }

    public function primaryImage(){
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function averageRating(){
        return $this->reviews()->avg('rating') ?? 0;
    }

    public function fullStars(){
        return floor($this->averageRating());
    }

    public function hasHalfStar(){
        return ($this->averageRating() - $this->fullStars()) >= 0.5;
    }

    public function cartItems(){
        return $this->hasMany(CartItem::class);
    }

    public function getSavingsAttribute(){
        if($this->is_on_sale && $this->original_price){
            return $this->original_price - $this->price;
        }
        return 0;
    }

    public function setOnSale($newPrice){
        if ($newPrice>=$this->price){
            throw new \Exception("Cena promocyjna musi być niższa od aktualnej ceny.");
        }

        $this->original_price = $this->price;
        $this->price = $newPrice;
        $this->is_on_sale = true;
        $this->discount_percentage = round((($this->original_price - $newPrice)/$this->original_price)*100, 2);
        $this->save();
    }

    public function removeFromSale(){
        if(!$this->is_on_sale){
            throw new \Exception("Produkt nie jest na promocji.");
        }

        $this->price = $this->original_price;
        $this->original_price = null;
        $this->is_on_sale = false;
        $this->discount_percentage = null;
        $this->save();
    }

    public function updateRegularPrice($newPrice){
        if($this->is_on_sale){
            $this->original_price = $newPrice;
        }else{
            $this->price=$newPrice;
        }
        $this->save();
    }

    public function setOnSaleByPercentage($discountPercentage){
        if($discountPercentage<=0||$discountPercentage>=100){
            throw new \Exception('Procent zniżki musi być między 1 a 99.');
        }

        $this->original_price = $this->price;
        $discountAmount = ($this->price*$discountPercentage)/100;
        $this->price = round($this->price - $discountAmount, 2);
        $this->is_on_sale = true;
        $this->discount_percentage = $discountPercentage;
        $this->save();
    }

    public function features(){
        return $this->hasMany(ProductFeature::class)->orderBy('order');
    }

    public function formattedDescription(){
        $lines = explode('|', $this->description);
        $formatted = '';
        foreach($lines as $line){
            $line = trim($line);
            if(str_contains($line, ':')){
                [$label, $value] = explode(':', $line, 2);
                $formatted .= '<span class="text-muted">'.e(trim($label)).':</span> '.e(trim($value)).'<br>';
            }else{
                $formatted .= e($line).'<br>';
            }
        }
        return $formatted;
    }
}
