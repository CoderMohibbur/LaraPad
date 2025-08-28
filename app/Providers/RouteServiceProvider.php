<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

// ✅ add these
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // ✅ Contact form throttle: 5 req / minute / IP
        RateLimiter::for('submit', function ($request) {
            return [Limit::perMinute(5)->by($request->ip())];
        });

        RateLimiter::for('submit', function ($request) {
            return [Limit::perMinute(5)->by($request->ip())];
        });

        // (আপনার আগের route bindings/ম্যাপিং থাকলে সেগুলো যেমন আছে থাকুক)
    }
}
