<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\FavoritoController;

use App\Models\Producto;

#auth rutas
Route::get("/", [AuthController::class,"index"]);
Route::post("/", [AuthController::class,"process"]);
Route::get("/registrar", [AuthController::class,"register"]);
Route::get("/cuenta", [AuthController::class,"cuenta"]);
Route::get("/entrar", [AuthController::class,"login"]);
Route::get("/salir", [AuthController::class,"logout"]);
Route::get('/favoritos', [AuthController::class, 'favoritos'])->name('usuario.favoritos');

#aqui las rutas de categoria
Route::get('/catalogo', [ProductController::class,'index']);
Route::post('/catalogo', [ProductController::class, 'store']);
Route::get('/catalogo', [ProductController::class, 'buscar']);

#categorias especificas
Route::get("/teclados", [ProductController::class,"teclados"]);
Route::get("/mouses", [ProductController::class, "mouses"]);
Route::get("/auriculares", [ProductController::class, "auriculares"]);
Route::get("/microfonos", [ProductController::class, "microfonos"]);
Route::get("/gamepads", [ProductController::class, "gamepads"]);
Route::get("/webcams", [ProductController::class, "webcams"]);
Route::get("/monitores", [ProductController::class, "monitores"]);

#detalle-producto rutas
Route::get('/detalle-producto/{id}', function ($id) {
    $producto = Producto::findOrFail($id);
    return view('detalle-producto', compact('producto'));
});

Route::post('/favoritos/agregar', [FavoritoController::class, 'agregar'])->name('favoritos.agregar');
Route::post('/favoritos/quitar', [FavoritoController::class, 'quitar'])->name('favoritos.quitar');

#CARRITO RUTAS DOLOR DE CABEZA :v
Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::get('/carrito', [CarritoController::class, 'mostrar'])->name('carrito.mostrar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::post('/carrito/checkout', [CarritoController::class, 'checkout'])->name('carrito.checkout');
Route::post('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');



Route::get('/soporte', function () {
    return view('soporte');
});

Route::get('/detalle-producto', function () {
    return view('detalle-producto');
});

