<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'room',
        'date',
        'time',
        'status',
    ];
}