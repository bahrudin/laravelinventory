<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $guarded = [];
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_card', 'customer_card');
    }

    public function employees(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'emp_card', 'emp_card')
            ->withDefault();
    }
}
