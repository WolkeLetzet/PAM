<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    use HasFactory;
    function computadores()
    {
        return $this->hashMany(Computador::class, 'encargado_id');
    }
}
