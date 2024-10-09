<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkout_session_id',
        'name',
        'email',
        'phone',
        'currency',
        'amount',
        'description',
        'item_name',
        'quantity',
        'status',
    ];

    public $timestamps = false;

 
}