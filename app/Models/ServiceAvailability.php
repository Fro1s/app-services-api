<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceAvailability extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = 'service_availabilities';

    protected $fillable = [
        'day_of_week',
        'start_time',
        'end_time',
        'service_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
