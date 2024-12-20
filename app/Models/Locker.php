<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'locker_no',
        'start_date',
        'due_date',
        'amount',
        'month',
        'status',
        'action_status',
        'mail_flag'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'user_id');
    }
}