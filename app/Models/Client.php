<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
     * One client has many appointments
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Many-to-many relationship: clients <-> nail techs
     */
    public function nailTechs()
    {
        return $this->belongsToMany(NailTech::class, 'client_nail_tech')
                    ->withTimestamps();
    }

    /**
     * Get primary nail tech name (first assigned tech)
     */
    public function primaryNailTechName(): ?string
    {
        $first = $this->nailTechs()->first();
        return $first ? $first->name : null;
    }

    /**
     * Delete client image from storage
     */
    public function deleteImage()
    {
        if ($this->image && Storage::disk('public')->exists($this->image)) {
            Storage::disk('public')->delete($this->image);
        }
    }
}
