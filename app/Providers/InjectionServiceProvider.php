<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class InjectionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // services...
        $this->injectApiMobileV1Services();
        //$this->injectApiMobileV2Services();
        //$this->injectApiMobileV3Services();

        // repositories...
        //$this->injectApiMobileV1Repositories();
        //$this->injectApiMobileV2Repositories();
        //$this->injectApiMobileV3Repositories();
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

    public function injectApiMobileV1Services()
    {
        $services = [
            'Auth',
        ];

        foreach ($services as $service) {
            $this->app->singleton(
                "App\Services\Api\Mobile\V1\\{$service}ServiceContract",
                "App\Services\Api\Mobile\V1\\{$service}\\{$service}Service",
            );
        }
    }
}
