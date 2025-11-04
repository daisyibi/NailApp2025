<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'user_id',
        'appointment_date',
        'start_time',
        'status',
    ];

    // Automatically cast dates to Carbon objects
    protected $casts = [
        'appointment_date' => 'datetime', // <-- This is the key
        'start_time' => 'datetime:H:i',   // Optional: cast start_time to Carbon with time format
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
