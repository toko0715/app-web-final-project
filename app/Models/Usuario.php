<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['name', 'email', 'password', 'fecha_nacimiento'];
    public function detalle(){
        return $this->hasOne(DetalleUsuario::class, 'usuario_id');
    }
    public function favoritos()
    {
        return $this->hasMany(Favorito::class, 'usuario_id');
    }
}
