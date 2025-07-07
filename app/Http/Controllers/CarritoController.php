<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Models\Carrito;
use App\Models\CarritoProducto;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\DetallePedido;
use Illuminate\Support\Facades\DB;

class CarritoController extends Controller
{
    public function agregar(Request $request)
    {
        $usuario = Usuario::where('name', session('user'))->first();
        if (!$usuario) return redirect('/entrar');

        // Crear carrito si no existe
        $carrito = Carrito::firstOrCreate(['usuario_id' => $usuario->id]);

        $productoId = $request->input('producto_id');
        $cantidad = (int) $request->input('cantidad', 1);
        $producto = Producto::findOrFail($productoId);

        // Ver si ya está en el carrito
        $carritoProducto = CarritoProducto::where('carrito_id', $carrito->id)
            ->where('producto_id', $productoId)
            ->first();

        if ($carritoProducto) {
            // Actualizar cantidad
            $carritoProducto->cantidad += $cantidad;
            $carritoProducto->subtotal = $carritoProducto->cantidad * $carritoProducto->precio_unitario;
            $carritoProducto->save();
        } else {
            // Crear nuevo
            CarritoProducto::create([
                'carrito_id' => $carrito->id,
                'producto_id' => $producto->id,
                'cantidad' => $cantidad,
                'precio_unitario' => $producto->precio,
                'subtotal' => $producto->precio * $cantidad,
            ]);
        }

        return redirect()->route('carrito.mostrar');
    }

    public function mostrar()
    {
        $usuario = Usuario::where('name', session('user'))->first();

        if (!$usuario) {
            return redirect('/entrar')->with('error', 'Debes iniciar sesión para ver tu carrito.');
        }

        $carrito = Carrito::where('usuario_id', $usuario->id)->first();

        $items = [];

        $subtotal = 0;

        if ($carrito) {
            $items = $carrito->productos()->with('producto')->get(); // Asegúrate que tengas la relación
            $subtotal = $items->sum('subtotal');
        }

        return view('carritocompras', [
            'items' => $items,
            'subtotal' => $subtotal,
        ]);
    }

    public function eliminar($id)
    {
        $item = CarritoProducto::findOrFail($id);
        $item->delete();
        return redirect()->route('carrito.mostrar');
    }

    public function checkout(Request $request)
    {
        $nombreUsuario = session('user');
        if (!$nombreUsuario) {
            return redirect('/entrar')->with('error', 'Debes iniciar sesión para realizar la compra.');
        }

        $usuario = Usuario::where('name', $nombreUsuario)->first();
        if (!$usuario) {
            return redirect('/entrar')->with('error', 'Usuario no encontrado.');
        }

        $carrito = Carrito::with('carritoProductos')->where('usuario_id', $usuario->id)->first();


        if (!$carrito || $carrito->carritoProductos->isEmpty()) {
            return redirect('/carrito')->with('error', 'Tu carrito está vacío.');
        }

        DB::beginTransaction();

        try {
            $pedido = Pedido::create([
                'usuario_id' => $usuario->id,
                'total' => $carrito->carritoProductos->sum('subtotal'),
                'estado' => 'pendiente',
            ]);

            foreach ($carrito->carritoProductos as $item) {
                DetallePedido::create([
                    'pedido_id' => $pedido->id,
                    'producto_id' => $item->producto_id,
                    'cantidad' => $item->cantidad,
                    'precio_unitario' => $item->precio_unitario,
                    'subtotal' => $item->subtotal,
                ]);
            }

            // Limpiar carrito
            $carrito->carritoProductos()->delete();

            DB::commit();
            return redirect('/')->with('success', 'Compra realizada exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/carrito')->with('error', 'Error al procesar el pedido.');
        }
    }

    public function vaciar()
    {
        $usuario = Usuario::where('name', session('user'))->first();

        if (!$usuario) {
            return redirect('/entrar')->with('error', 'Usuario no autenticado.');
        }

        $carrito = Carrito::where('usuario_id', $usuario->id)->first();

        if ($carrito) {
            $carrito->carritoProductos()->delete(); // borra todos los items del carrito
        }

        return redirect()->route('carrito.mostrar')->with('success', 'Carrito vaciado correctamente.');
    }


}