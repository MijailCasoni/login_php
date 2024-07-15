<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Crear usuario administrador con contraseña en texto plano
        $admin = User::factory()->create([
            'nombre' => 'Admin',
            'apellido' => 'Create',
            'email' => 'admin@example.com',
            'password' => 'admin234', // Contraseña en texto plano
            'role' => 'admin',
        ]);

        // Encriptar la contraseña con bcrypt
        $admin->password = Hash::make('admin234');
        $admin->save();

        // Crear otros usuarios
        User::factory()->count(10)->create();
    }
}


