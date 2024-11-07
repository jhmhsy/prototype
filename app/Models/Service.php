<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'member_id',
        'service_type',
        'start_date',
        'due_date',
        'amount',
        'month',
        'status',
        'service_id',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'user_id');
    }
}