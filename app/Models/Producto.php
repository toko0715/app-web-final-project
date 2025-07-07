<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre', 'categoria', 'descripcion', 'precio',
        'stock', 'disponible', 'imagen',
    ];
    public function favoritos()
    {
        return $this->hasMany(Favorito::class, 'producto_id');
    }
}
