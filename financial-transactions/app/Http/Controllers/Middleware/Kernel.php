<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Routing\Middleware\SubstituteBindings;
use App\Http\Middleware\TrustProxies;
use Illuminate\Http\Middleware\SetCacheHeaders;
use Illuminate\Routing\Middleware\ThrottleRequests;
use App\Http\Middleware\EncryptCookies;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Session\Middleware\StartSession;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Middleware\PreventRequestsDuringMaintenance;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Fruitcake\Cors\HandleCors;
use Illuminate\Cookie\Middleware\EncryptCookies as MiddlewareEncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as MiddlewarePreventRequestsDuringMaintenance;
use Illuminate\Http\Middleware\HandleCors as MiddlewareHandleCors;
use Illuminate\Http\Middleware\TrustProxies as MiddlewareTrustProxies;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        MiddlewareTrustProxies::class,
        MiddlewareHandleCors::class,
        SetCacheHeaders::class,
        SubstituteBindings::class,
        MiddlewareEncryptCookies::class,
        AddQueuedCookiesToResponse::class,
        StartSession::class,
        VerifyCsrfToken::class, // Garante que o CSRF seja verificado.
        MiddlewarePreventRequestsDuringMaintenance::class,
        ShareErrorsFromSession::class,
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    ];
}
