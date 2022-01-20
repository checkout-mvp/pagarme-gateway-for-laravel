<?php

namespace MartinsHumberto\PagarmeGateway\Providers;

use Illuminate\Support\ServiceProvider;
use MartinsHumberto\PagarmeGateway\Services\PagarmeGatewayService as PagarmeClient;

class PagarmeGatewayServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        $this->publishes(
            [
              __dir__ . '/../../config/config.php' => config_path('pagarmegateway.php')
            ]
        );

        $this->loadRoutesFrom(__dir__ . '/../../config/routes.php');

        $this->loadMigrationsFrom(__dir__ . '/../../migrations');
    }

    public function register()
    {
        $this->registerPagerMe();

        $this->app->make('MartinsHumberto\PagarmeGateway\Controllers\PagarmeNotificationController');

        $this->mergeConfig();
    }

    private function registerPagerMe()
    {
        $this->app->singleton(
            'pagarme_gateway',
            static function () {
                return new PagarmeClient();
            }
        );
    }

    public function mergeConfig()
    {
        $this->mergeConfigFrom(
            __dir__.'/../../config/config.php',
            'pagarmegateway'
        );
    }
}
