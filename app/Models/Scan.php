<?php
// app/Models/Scan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Scan extends Model
{
    use HasFactory;

    protected $fillable = [
        'result',
        'user_id',
        'ip_address',
        'user_agent',
        'processed_at'
    ];

    protected $casts = [
        'processed_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}