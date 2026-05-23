<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Session\TokenMismatchException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
        ]);

        // Where to send guests when they hit a protected route.
        $middleware->redirectGuestsTo(fn() => route('admin.login'));

        // Where to send authenticated users when they hit a guest-only route
        // (e.g. /admin/login). Without this, Laravel sends them to "/home".
        $middleware->redirectUsersTo(function ($request) {
            $user = $request->user();
            if ($user && $user->is_admin) {
                return route('admin.dashboard');
            }
            return route('home');
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Handle CSRF / session expiration (419) gracefully instead of
        // showing the default error page. Sends the user back to the form
        // with a friendly message so they can re-submit.
        $exceptions->render(function (TokenMismatchException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Your session has expired. Please refresh and try again.',
                ], 419);
            }

            return redirect()
                ->back()
                ->withInput($request->except(['password', 'password_confirmation', '_token']))
                ->withErrors([
                    'session' => 'Your session expired. Please try again.',
                ]);
        });
    })->create();
