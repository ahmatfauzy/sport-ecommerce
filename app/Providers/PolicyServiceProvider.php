<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class PolicyServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Gate::policy(\App\Models\Cart::class, \App\Policies\CartPolicy::class);
        Gate::policy(\App\Models\Order::class, \App\Policies\OrderPolicy::class);
    }
}
