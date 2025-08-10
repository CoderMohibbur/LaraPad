<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['components.nav-menu'], function ($view) {
            // কেবল লেআউট/নাভে শেয়ার করতে চাইলে সেই ভিউ নাম দিন
            $menuTree = Cache::remember('nav_header', 3600, function () {
                // unlimited depth eager loading helper
                $with = function ($depth = 12) use (&$with) {
                    return function ($q) use ($depth, $with) {
                        $q->where('is_active', 1)->orderBy('sort_order');
                        if ($depth > 1) {
                            $q->with(['children' => $with($depth - 1)]);
                        }
                    };
                };

                return Menu::header()
                    ->whereNull('parent_id')
                    ->with(['children' => $with(12)])
                    ->orderBy('sort_order')
                    ->get();
            });

            $view->with('menuTree', $menuTree);
        });
    }
}
