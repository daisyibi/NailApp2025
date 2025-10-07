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
        'nail_tech_name',
        'charms',
        'image',
        'notes',
    ];


    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
