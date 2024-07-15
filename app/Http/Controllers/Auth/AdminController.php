<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Método para mostrar el formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Método para procesar el inicio de sesión
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended($this->redirectTo());
        }

        return back()->withErrors(['email' => 'Email o contraseña incorrectos.']);
    }

    // Método para determinar la ruta de redirección según el rol del usuario
    private function redirectTo()
    {
        if (Auth::user()->role === 'admin') {
            return route('admin.dashboard');
        }

        return route('user.dashboard');
    }

    // Método para cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Método para mostrar el dashboard de administrador
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    // Método para crear un nuevo usuario
    public function createUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:user,admin',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Usuario creado exitosamente.');
    }
}

