<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipDuration extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'start_date',
        'due_date',
        'status'
    ];

    protected $dates = [
        'start_date',
        'due_date'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}