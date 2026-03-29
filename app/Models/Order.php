<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'guest_email', 'order_number', 'total_amount', 'status', 'phone', 'shipping_first_name', 'shipping_last_name', 'shipping_street', 'shipping_building_number', 'shipping_apartment_number', 'shipping_city', 'shipping_postal_code'
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_PAID = 'paid';
    const STATUS_REFUNDED = 'refunded';
    const STATUS_SHIPPED = 'shipped';

    public static function getStatuses()
    {
        return [
            self::STATUS_PENDING => 'Oczekujące na płatność',
            self::STATUS_PAID => 'Opłacone',
            self::STATUS_PROCESSING => 'W realizacji',
            self::STATUS_SHIPPED => 'Wysłane',
            self::STATUS_DELIVERED => 'Dostarczone',
            self::STATUS_COMPLETED => 'Zakończone',
            self::STATUS_CANCELLED => 'Anulowane',
            self::STATUS_REFUNDED => 'Zwrócone'
        ];
    }

    public function getStatusNameAttribute(){
        return self::getStatuses()[$this->status] ?? $this->status;
    }

    public function getCustomerNameAttribute(){
        if($this->user){
            return $this->user->name;
        }
        return trim($this->shipping_first_name.' '.$this->shipping_last_name);
    }

    public function getFullShippingAddressAttribute(){
        $parts = [
            $this->shipping_street,
            $this->shipping_building_number.($this->shipping_apartment_number ? '/'.$this->shipping_apartment_number : ''),
            $this->shipping_postal_code.' '.$this->shipping_city
        ];
        return implode(', ', array_filter($parts));
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function items(){
        return $this->hasMany(OrderItem::class);
    }

    public function isGuestOrder(){
        return $this->user_id === null;
    }

    public function getEmailAttribute(){
        return $this->user ? $this->user->email : $this->guest_email;
    }

}
