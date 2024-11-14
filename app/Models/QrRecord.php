<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrRecord extends Model
{
    use HasFactory;

    // Table name (optional, Laravel automatically assumes plural form)
    protected $table = 'qr_records';

    // Fillable fields (to allow mass assignment)
    protected $fillable = ['id_number'];

    // Disable timestamps (no need for created_at and updated_at)
    public $timestamps = false;
}