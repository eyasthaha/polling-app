<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (Throwable $e, $request) {
            
            if ($request->expectsJson()) {
                $message = $e->getMessage();
                $status = ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpException) ? $e->getStatusCode() : 400;

                if ($e instanceof ValidationException) {
                    $errors = $e->errors();
                    $message = 'Validation failed';
                    $status = 422;
                }

                return response()->json([
                    'success' => false,
                    'message' => $message,
                ], $status);
            }

            // return redirect()->back()->withErrors([
            //     'error' => $e->getMessage(),
            // ]);

        });
    })->create();
