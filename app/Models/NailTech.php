<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NailTech extends Model
{
    use HasFactory;


    protected $table = 'nail_techs';

    protected $fillable = [
        'name',
        'speciality',
        'hourly_rate',
    ];

    // Many-to-many: NailTech <-> Client
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_nail_tech')->withTimestamps();
    }
}
