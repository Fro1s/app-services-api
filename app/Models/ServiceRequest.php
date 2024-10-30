<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceRequest extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = 'service_requests';

    protected $fillable = [
        'description',
        'preferred_date',
        'budget',
        'seeker_id',
        'category_id',
    ];

    public function seeker()
    {
        return $this->belongsTo(User::class, 'seeker_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
