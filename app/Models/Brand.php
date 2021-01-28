<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Product;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'brand_name',
        'country',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
