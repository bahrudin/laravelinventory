<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'descriptions'
    ];
    protected $guarded = [];

    public function employee():HasMany
    {
        return $this->hasMany(Employee::class,'job_id','id');
    }
}
