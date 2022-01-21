<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacenamiento extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Almacenamiento
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function computador()
    {
        return $this->belongsTo(Computador::class, 'computador_id');
    }
}
