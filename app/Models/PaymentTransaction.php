<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkout_session_id',
        'amount',
        'paid_at',
        'status',
        'payment_method',
        'name',
        'email',
        'phone',
        'description',
        'item_name',
        'quantity',
        'currency',
        'fee',
        'net_amount'
    ];
    protected $casts = [
        'paid_at' => 'datetime',
    ];

    public $timestamps = false;

 
}