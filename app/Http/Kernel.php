<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // Otros middleware definidos aquí...

    protected $routeMiddleware = [
        // Otros middleware...
        'role' => \App\Http\Middleware\RoleMiddleware::class,
    ];

    // Otros métodos de configuración de middleware...
}

