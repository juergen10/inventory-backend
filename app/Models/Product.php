<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $hidden = [
        'id'
    ];
    protected $fillable = [
        'name',
        'description'
    ];

    protected static function boot(
    ) {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = (string) Str::orderedUuid();
        });
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_uuid', 'uuid');
    }
}