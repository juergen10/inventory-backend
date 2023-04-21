<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantImage extends Model
{
    use HasFactory;

    protected $appends = [
        'imageUrl'
    ];
    /**
     * Get the user's first name.
     */
    public function getImageUrlAttribute()
    {
        $base = config('app.url');
        return $base . '/products/' . $this->name;
    }
}