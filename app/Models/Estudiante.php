<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estudiante extends Model
{
    protected $fillable = ['numero_lista', 'nombre'];

    public function registros(): HasMany
    {
        return $this->hasMany(RegistroAseo::class);
    }
}