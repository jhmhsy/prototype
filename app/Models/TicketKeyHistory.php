<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketKeyHistory extends Model
{
    use HasFactory;

    protected $fillable = ['random_string'];
}