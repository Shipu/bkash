<?php

namespace Shipu\Bkash;

use Illuminate\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;
use Shipu\Bkash\Managers\Tokenized;

class BkashServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->setupConfig();
    }
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->registerSslWPayment();
    }
    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/../config/bkash.php');
        // Check if the application is a Laravel OR Lumen instance to properly merge the configuration file.
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('bkash_api.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('bkash_api');
        }
        $this->mergeConfigFrom($source, 'bkash_api');
    }
    /**
     * Register Talk class.
     */
    protected function registerBkash()
    {
        $this->app->bind('bkash.tokenized', function (Container $app) {
            return new Tokenized($app['config']->get('bkash_api'));
        });

        $this->app->alias('bkash.tokenized', Tokenized::class);
    }

}
