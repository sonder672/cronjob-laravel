<?php

namespace App\Providers;

use App\Repository\Contract\IProductShow;
use App\Repository\Contract\IRequestStore;
use App\Repository\Eloquent\ProductShow;
use App\Repository\Eloquent\RequestStore;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            IProductShow::class,
            ProductShow::class
        );

        $this->app->bind(
            IRequestStore::class,
            RequestStore::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
