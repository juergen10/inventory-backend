<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ProductVariant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_uuid',
        'variant_uuid',
        'sku',
        'price',
        'stock',
        'weight',
        'fund'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = (string) Str::orderedUuid();
        });
    }

    public function images()
    {
        return $this->hasMany(ProductVariantImage::class, 'product_variant_uuid', 'uuid');
    }

    public function option()
    {
        return $this->hasOneThrough(Option::class, ProductVariantOption::class, 'product_variant_uuid', 'uuid', 'uuid', 'option_uuid');
    }
}