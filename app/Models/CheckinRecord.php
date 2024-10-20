<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckinRecord extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'checkin_time',
        'checkin_date',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'user_id');
    }
}