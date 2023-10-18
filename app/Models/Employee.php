<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'emp_card',
        'job_id',
        'first_name',
        'middle_name',
        'last_name',
        'birth_place',
        'birth_day',
        'gender',
        'phone',
        'phone_urgent',
        'address',
        'is_status'
    ];

    protected $appends = ['full_name'];

    /**
     * Get the user that owns the phone.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function jobs(): BelongsTo
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'emp_card','emp_card');
    }

    public function fullName(): Attribute
    {
        return new Attribute(
            get: fn() => $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name
        );
    }

    public function getFullNameAttribute()
    {
        return "{$this['first_name']} {$this['middle_name']} {$this['last_name']}";
    }
}
