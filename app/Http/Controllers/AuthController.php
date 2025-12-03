<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    // logica de login
    public function loginForm()
    {
        return view('login.login'); // a login.blade.php
    }

    public function login(Request $request) {
        $correo = $request->input('correoUsuario');
        $password = $request->input('passwordUsuario');

        // ADMIN - Redirige al CRUD completo (deportistas.index)
        if ($correo == 'aiza4840@gmail.com' && $password == 'aiypwzqp') {
            Session::put('es_admin', true);
            Session::put('nombre_usuario', 'Administrador');
            return redirect()->route('deportistas.index'); // A tu CRUD
        }

        // USUARIO NORMAL - Redirige a visitante/menu
        $usuario = Usuario::where('correoUsuario', $correo)->first();

        if ($usuario && Hash::check($password, $usuario->passwordUsuario)) {
            Session::put('usuario_id', $usuario->id);
            Session::put('nombre_usuario', $usuario->nombreUsuario);
            return redirect()->route('deportistas.index2'); // Cambia esto
        } else {
            return back()->with('error', 'Correo o contraseña incorrectos');
        }
    }

    public function registro(Request $request) {
        $request->validate([
            'nombreUsuario' => 'required',
            'correoUsuario' => 'required|email',
            'passwordUsuario' => 'required|min:6'
        ]);

        $codigo = random_int(100000, 999999);

        Mail::raw("Tu código de verificación es: $codigo", function($message) use ($request) {
            $message->to($request->correoUsuario)
                    ->subject('Código de Verificación');
        });

        Session::put('verification_code', $codigo);
        Session::put('correo', $request->correoUsuario);
        Session::put('nombre', $request->nombreUsuario);
        Session::put('password', $request->passwordUsuario);

        return redirect()->route('verify.form')->with('success', 'Se ha enviado el código a tu correo');
    }

    public function showVerifyForm() {
        return view('login.verify');
    }

    public function verifyEmail(Request $request) {
        if ($request->verification_code == Session::get('verification_code')) {
            $correo = Session::get('correo');
            $nombre = Session::get('nombre');
            $password = Hash::make(Session::get('password'));

            if (!Usuario::where('correoUsuario', $correo)->exists()) {
                Usuario::create([
                    'nombreUsuario' => $nombre,
                    'correoUsuario' => $correo,
                    'passwordUsuario' => $password
                ]);
                return redirect()->route('login')->with('success', 'Usuario registrado con éxito');
            } else {
                return redirect()->route('login')->with('info', 'El usuario ya existe. Inicia sesión.');
            }
        } else {
            return back()->with('error', 'Código incorrecto');
        }
    }

    public function menuCentral(Request $request) {
        $usuario_id = Session::get('usuario_id');
        return view('', ['usuario_id' => $usuario_id]);
    }

    public function logout(Request $request)
    {
        Session::flush(); // Elimina toda la sesión
        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente');
    }

}
