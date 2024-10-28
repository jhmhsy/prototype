<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_number',
        'name',
        'phone',
        'fb',
        'email',
        'user_identifier',
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'user_id');
    }

    public function lockers()
    {
        return $this->hasMany(Locker::class, 'user_id');
    }

    public function treadmills()
    {
        return $this->hasMany(Treadmill::class, 'user_id');
    }

    public function checkinRecords()
    {
        return $this->hasMany(CheckinRecord::class, 'user_id');
    }

    public function qrcode()
    {
        return $this->hasOne(MemberQrcode::class);
    }
}