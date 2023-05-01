<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = (string) Str::orderedUuid();
        });
    }

    protected $fillable = [
        'customer_uuid',
        'order_date',
        'order_status',
        'total_price',
        'payment_method',
        'shipping_address'
    ];
}