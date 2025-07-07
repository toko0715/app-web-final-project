<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductController extends Controller
{
    public function index() {
        $productos = Producto::all();
        return view("catalogo", compact("productos"));
    }

    public function categoria(Request $request) {
        $productos = Producto::all();
        $categoria = $request->input("");
    }

    public function buscar(Request $request) {
        $query = $request->input('query');

        $productos = Producto::where('nombre', 'LIKE', '%' . $query . '%')->get();

        return view('catalogo', compact('productos'));
    }
    public function teclados() {
        $productos = Producto::where('categoria', 'teclados')->get();
        return view('catalogo', compact('productos'));
    }
    public function mouses() {
        $productos = Producto::where('categoria', 'mouses')->get();
        return view('catalogo', compact('productos'));
    }
    public function auriculares() {
        $productos = Producto::where('categoria', 'auriculares')->get();
        return view('catalogo', compact('productos'));
    }
    public function microfonos() {
        $productos = Producto::where('categoria', 'microfonos')->get();
        return view('catalogo', compact('productos'));
    }
    public function gamepads() {
        $productos = Producto::where('categoria', 'gamepads')->get();
        return view('catalogo', compact('productos'));
    }
    public function webcams() {
        $productos = Producto::where('categoria', 'webcams')->get();
        return view('catalogo', compact('productos'));
    }
    public function monitores() {
        $productos = Producto::where('categoria', 'monitores')->get();
        return view('catalogo', compact('productos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'nullable|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'disponible' => 'required|boolean',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $imagenNombre = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('img'), $imagenNombre);
            $validated['imagen'] = $imagenNombre;
        }

        Producto::create($validated);

        return redirect('/catalogo')->with('success', 'Producto insertado correctamente');
    }


}
