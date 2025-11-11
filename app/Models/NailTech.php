<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NailTech extends Model
{
    use HasFactory;
     protected $table = 'nail_techs'; 

    protected $fillable = ['name', 'speciality', 'hourly_rate'];

    // NailTech has many clients (pivot)
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_nail_tech');
    }
}
