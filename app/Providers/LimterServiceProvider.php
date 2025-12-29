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
            $this->passwordLimiter();
    }
    protected  function limiter()
    {
        RateLimiter::for('limiter', function (Request $request) {
            return Limit::perMinute(20)->by($request->ip())->response(function () {
                return apiResponse(429, 'You are sending too many requests please try again later');
            });
        });
    }
    
    protected function passwordLimiter()
    {
        RateLimiter::for('passwordLimiter', function (Request $request) {
            return Limit::perMinutes(15, 3)
                ->by($request->ip())
                ->response(function () {
                    return apiResponse(
                        429,
                        'Too many login attempts. Please try again in 15 minutes'
                    );
                });
        });

    }
}
