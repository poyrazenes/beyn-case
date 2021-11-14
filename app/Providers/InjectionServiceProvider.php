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
        $this->injectIntegrationServices();
        //$this->injectApiMobileV3Services();

        // repositories...
        $this->injectApiMobileV1Repositories();
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
            'Auth', 'User', 'Service', 'Car', 'Order'
        ];

        foreach ($services as $service) {
            $this->app->singleton(
                "App\Services\Api\Mobile\V1\\{$service}ServiceContract",
                "App\Services\Api\Mobile\V1\\{$service}\\{$service}Service",
            );
        }
    }

    public function injectApiMobileV1Repositories()
    {
        $repositories = [
            'Order'
        ];

        foreach ($repositories as $repository) {
            $this->app->singleton(
                "App\Repositories\Api\Mobile\V1\\{$repository}RepositoryContract",
                "App\Repositories\Api\Mobile\V1\\{$repository}\\{$repository}Repository",
            );
        }
    }

    public function injectIntegrationServices()
    {
        $services = [
            'Car'
        ];

        foreach ($services as $service) {
            $this->app->singleton(
                "App\Services\Integration\\{$service}ServiceContract",
                "App\Services\Integration\\{$service}\\{$service}Service",
            );
        }
    }
}
