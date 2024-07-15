<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Ajusta el namespace según sea necesario

class PasswordMigrationSeeder extends Seeder
{
    public function run()
    {
        // Ejemplo: actualizar contraseñas de usuarios
        $usuarios = User::all();

        foreach ($usuarios as $usuario) {
            $usuario->password = Hash::make($usuario->password);
            $usuario->save();
        }
    }
}
