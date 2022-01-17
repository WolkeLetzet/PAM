<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Computador;

class Oficina extends Model
{
    use HasFactory;
    function computadores()
    {
        return $this->belongsToMany(Computador::class, 'computador_oficina', 'computador_id', 'oficina_id')->withTimeStamps();
    }
}
