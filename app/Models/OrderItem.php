<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_uuid',
        'product_uuid',
        'product_variant_uuid',
        'quantity',
        'price',
        'total_price'
    ];
}