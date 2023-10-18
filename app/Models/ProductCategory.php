<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products():HasMany
    {
        return $this->hasMany(Product::class,'cat_code','code');
    }

    public function suppliers():HasMany
    {
        return $this->hasMany(Supplier::class,'cat_code','code');
    }
}
