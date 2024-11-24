<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id', // origin member_id
        'service_type',
        'start_date',
        'due_date',
        'amount',
        'month',
        'status',
        'service_id',
        'action_status',
        'mail_flag'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'user_id');
    }
}