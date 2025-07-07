<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Favorito;
use App\Models\Usuario;

class FavoritoController extends Controller
{
    public function agregar(Request $request)
    {
        $productoId = $request->input('producto_id');
        $usuario = Usuario::where('name', session('user'))->first();

        if (!$usuario) return redirect('/entrar');

        $existe = Favorito::where('usuario_id', $usuario->id)
                          ->where('producto_id', $productoId)
                          ->first();

        if (!$existe) {
            Favorito::create([
                'usuario_id' => $usuario->id,
                'producto_id' => $productoId,
            ]);
        }

        return back();
    }

    public function quitar(Request $request)
    {
        $productoId = $request->input('producto_id');
        $usuario = Usuario::where('name', session('user'))->first();

        if (!$usuario) return redirect('/entrar');

        Favorito::where('usuario_id', $usuario->id)
                ->where('producto_id', $productoId)
                ->delete();

        return back();
    }
}
