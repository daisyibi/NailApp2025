<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NailTech extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'speciality',
        'hourly_rate',
    ];

    // Many-to-many: nail techs <-> clients
    public function clients()
    {
        return $this->belongsToMany(\App\Models\Client::class, 'client_nail_tech')
                    ->withTimestamps();
    }
}
