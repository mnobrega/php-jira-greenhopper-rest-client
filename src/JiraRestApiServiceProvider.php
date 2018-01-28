<?php

namespace JiraGreenhopperRestApi;

use Illuminate\Support\ServiceProvider;
use JiraGreenhopperRestApi\Configuration\ConfigurationInterface;
use JiraGreenhopperRestApi\Configuration\DotEnvConfiguration;

class JiraGreenhopperRestApiServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
    }

    /**
     * Register bindings in the container.
     */
    public function register()
    {
        $this->app->bind(ConfigurationInterface::class, function () {
            return new DotEnvConfiguration(base_path());
        });
    }
}
