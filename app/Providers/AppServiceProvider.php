<?php

namespace App\Providers;

use App\Billing\Stripe;
use App\Post;
use App\Tag;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function($view) {
            $view->with('archives', Post::archives());
            $view->with('tags', Tag::pluck('name'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Como fazer um bind no container:
        // Fazer referência a qualquer caminho de classe
        $this->app->singleton(Stripe::class, function () {
            return new Stripe(config('services.stripe.secret'));
        });

    }
}
