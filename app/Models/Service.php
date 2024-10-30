<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = 'services';

    protected $fillable = [
        'title',
        'description',
        'price',
        'provider_id',
        'category_id',
    ];

    protected $appends = [
        'availability',
    ];

    protected $hidden = [
        'availabilities',
    ];

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function availabilities()
    {
        return $this->hasMany(ServiceAvailability::class, 'service_id');
    }

    public function getAvailabilityAttribute()
    {
        return $this->availabilities;
    }
}
