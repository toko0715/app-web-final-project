<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleUsuario extends Model
{
    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }


}
