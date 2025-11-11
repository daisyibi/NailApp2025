<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'design_choice',
        'charms',
        'image',
        'notes',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Client has many appointments
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Many-to-Many relationship with NailTech
     */
    public function nailTech()
    {
        return $this->belongsToMany(NailTech::class, 'client_nail_tech');
        return $this->belongsToMany(NailTech::class, 'nail_tech_id');
    }
}
