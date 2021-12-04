<?php
declare(strict_types=1);
namespace App\Providers;

use App\Contratcs\GetPrices;
use App\GetReePrices;
use Illuminate\Support\ServiceProvider;

class ElectricServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(GetPrices::class,GetReePrices::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
