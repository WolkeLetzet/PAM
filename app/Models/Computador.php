<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Encargado;
use App\Models\TipoUso;

class Computador extends Model
{
    protected $table = 'computadores';
    use HasFactory;
    

    /**
     * The oficinas that belong to the Computador
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function oficinas()
    {
        
        return $this->belongsToMany(Oficina::class, 'computador_oficina', 'computador_id', 'oficina_id')->withTimestamps();
        
    }



    public function tipo_usos()
    {
        return $this->belongsToMany(TipoUso::class, 'computador_tipo_usos', 'computador_id', 'tipo_uso_id');
    }

    /**
     * Get all of the comments for the Computador
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function scopeMarca($query,$marca){
        if($marca){
            return $query->where('marca','LIKE',"%$marca%");
        }
    }
    public function scopeEncargado($query,$encargado){
        if($encargado){
            return $query->orWhere('encargado','LIKE',"%$encargado%");
        }
    }

    public function scopeoficina($query,$oficina){
        if($oficina){
            return $query->whereHas('oficina','LIKE',"%$oficina%");
        }
    }
    

}
