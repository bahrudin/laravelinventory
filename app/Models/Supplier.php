<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Supplier extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category():BelongsTo
    {
        return $this->belongsTo(ProductCategory::class,'cat_code','code');
    }
}
