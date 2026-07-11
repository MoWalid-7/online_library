<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectTo(
            users: '/dashboard'
        );

        $middleware->alias([
            'admin'   => \App\Http\Middleware\AdminMiddleware::class,
            'student' => \App\Http\Middleware\StudentMiddleware::class,
            'author'  => \App\Http\Middleware\AuthorMiddleware::class,
        ]);
    })
    ->withMiddleware(function (Middleware $middleware): void {
        // Additional middleware may be registered here.
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
