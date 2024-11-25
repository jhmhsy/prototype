<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treadmill extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'start_date',
        'due_date',
        'month',
        'amount',
        'status',
        'action_status',
        'mail_flag'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'user_id');
    }
}