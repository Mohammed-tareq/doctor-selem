<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class LimterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
            $this->limiter();
    }
    protected  function limiter()
    {
        RateLimiter::for('limiter', function (Request $request) {
            return Limit::perMinute(20)->by($request->ip())->response(function () {
                return apiResponse(429, 'You are sending too many requests please try again later');
            });
        });
    }
}
