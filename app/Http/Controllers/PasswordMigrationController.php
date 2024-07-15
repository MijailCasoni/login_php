<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Ajusta el namespace según sea necesario

class PasswordMigrationController extends Controller
{
    public function migratePasswords()
    {
        $usuarios = User::all();

        foreach ($usuarios as $usuario) {
            $usuario->password = Hash::make($usuario->password);
            $usuario->save();
        }

        return "Contraseñas migradas correctamente.";
    }
}
