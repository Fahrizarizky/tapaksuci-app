<?php

use App\Http\Middleware\AdminactiveMiddleware;
use App\Http\Middleware\AdmincabangMiddleware;
use App\Http\Middleware\AdminpimdaMiddleware;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth' => AuthMiddleware::class,
            'adminpimda' => AdminpimdaMiddleware::class,
            'adminaktif' => AdminactiveMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
