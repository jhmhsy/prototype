<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'locker_no',
        'start_date',
        'due_date',
        'amount',
        'month',
        'status',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'user_id');
    }
}