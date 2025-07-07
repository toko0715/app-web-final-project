<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function productos()
    {
        return $this->hasMany(CarritoProducto::class);
    }
    protected $fillable = ['usuario_id'];
    public function carritoProductos()
    {
        return $this->hasMany(CarritoProducto::class);
    }
}
