<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberQrcode extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'qr_image_path',
        'qr_data'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}