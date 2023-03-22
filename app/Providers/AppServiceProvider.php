<?php

namespace App\Providers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private ?int $old = null;
    private ?int $curr = null;

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton('customer_id', function () {
            if (Auth::guard('customer')->check()) {
                $this->curr = Cache::get('customer_id');
            }

            if (is_null($this->curr) && !is_null($this->old)) {
                return $this->old;
            } elseif (is_null($this->old) && is_null($this->curr)) {
                return null;
            }

            $this->old = $this->curr;

            return $this->curr;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //
    }
}
