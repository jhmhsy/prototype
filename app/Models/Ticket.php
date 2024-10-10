<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;



    protected $fillable = [
        'name',
        'email',
        'phone',
        'currency',
        'amount',
        'description',
        'item_name',
        'quantity',
        'status',
        'payment',
        'encrypted_key',
        'encrypted_id',
    ];
}