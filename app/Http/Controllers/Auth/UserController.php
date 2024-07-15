<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function userDashboard()
    {
        return view('user.dashboard');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validación de los datos enviados
        $validated = $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Actualizar los datos según lo validado
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        if(!$user->save()){
            return redirect()->back()->withErrors(['error' =>'Error al actualizar tus datos' ]);
        }
        return redirect()->back()->with('success', 'Datos actualizados exitosamente.');
    }
}