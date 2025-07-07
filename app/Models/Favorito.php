<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
    protected $fillable = [
        'usuario_id',
        'producto_id',
    ];


}
