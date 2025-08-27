<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
         $middleware->alias([
        // ...altri alias...
        'is_admin' => \App\Http\Middleware\IsAdmin::class, // 👈 aggiungi questa
        'is_user'  => \App\Http\Middleware\IsUser::class,  // (se hai anche IsUser)
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
