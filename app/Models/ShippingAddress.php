<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'street',
        'building_number',
        'apartment_number',
        'postal_code',
        'city'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
