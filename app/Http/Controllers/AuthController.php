<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Models\Favorito;

class AuthController extends Controller
{
    public function index()
    {
        session()->put('status_register', true);
        session()->put('status_login', true);
        return view('index');
    }

    public function process(Request $request)
    {
        $userInput = $request->input('username');
        $emailInput = $request->input('email');
        $passwordInput = $request->input('password');
        $action = $request->input('action');
        $nacimientoInput = $request->input('nacimiento');
        if ($action === 'registrar') {
            // verificar email existente
            $userByEmail = Usuario::where('email', $emailInput)->first();
            if ($userByEmail) {
                session()->put('status_register', false);
                return redirect('/registrar')->with('error', 'El email ya está registrado');
            }

            // verificar username existente
            $userByUsername = Usuario::where('name', $userInput)->first();
            if ($userByUsername) {
                session()->put('status_register', false);
                return redirect('/registrar')->with('error', 'El nombre de usuario ya está registrado');
            }

            // crear nuevo usuario con password encriptada
            Usuario::create([
                'name' => $userInput,
                'email' => $emailInput,
                'password' => Hash::make($passwordInput),
                'fecha_nacimiento' => $nacimientoInput
            ]);

            session()->put('user', $userInput);
            session()->put('status_register', true);
            return redirect('/')->with('success', 'Usuario registrado exitosamente'); // mensaje por si acaso xd
        }

        if ($action === 'login') {
            // buscar usuario por email
            $user = Usuario::where('email', $emailInput)->first();
            // verificar usuario y password
            if ($user == null || !Hash::check($passwordInput, $user->password)) {
                session()->put('status_login', false);
                return redirect('/entrar')->with('error', 'Credenciales incorrectas');
            }
            session()->put('status_login', true);
            session()->put('user', $user->name);
            if ($user->email == "imroot@root") {
                return view('root');
            }
            return redirect('/')->with('success', 'Sesión iniciada correctamente');
        }
    }

    public function cuenta() {
        if (!session("user")) {
            return redirect("/entrar");
        }
        $usuario = Usuario::where('name', session('user'))->first();

        // Obtener los favoritos del usuario con el producto asociado
        $favoritos = Favorito::with('producto')->where('usuario_id', $usuario->id)->get();

        return view("micuenta", compact('favoritos'));
    }
    public function login()
    {
        if (session('user')) {
            return redirect("/cuenta");
        }
        session()->put('status_register', true);
        return view('iniciarsesion');
    }

    public function register()
    {
        if (session('user')) {
            return view('micuenta');
        }
        session()->put('status_login', true);
        return view('crearcuenta');
    }

    public function logout()
    {
        session()->forget('user');
        session()->forget('status_login');
        session()->forget('status_register');
        return redirect('/')->with('success', 'Sesión cerrada correctamente');
    }

    public function favoritos()
    {
        // Asegurarse de que el usuario está logueado
        $usuario = Usuario::where('name', session('user'))->first();
        if (!$usuario) {
            return redirect('/entrar');
        }

        // Obtener favoritos con el producto asociado
        $favoritos = Favorito::with('producto')->where('usuario_id', $usuario->id)->get();

        return view('favoritos', compact('favoritos'));
    }


}
