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
        'status',
        'mail_flag'
    ];

    // Define date casts
    protected $casts = [
        'start_date' => 'date',
        'due_date' => 'date'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    // Optional: Add accessors if you want formatted dates
    public function getFormattedStartDateAttribute()
    {
        return $this->start_date ? $this->start_date->format('Y-m-d') : '';
    }

    public function getFormattedDueDateAttribute()
    {
        return $this->due_date ? $this->due_date->format('Y-m-d') : '';
    }
}