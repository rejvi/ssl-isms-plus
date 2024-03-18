<?php


namespace Rejvi\SslIsmsPlus;

use Illuminate\Support\ServiceProvider;


class SmsServiceProvider extends ServiceProvider
{
    /**
     * Publishes configuration file.
     *
     * @return  void
     */
    public function boot() : void
    {
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() : void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/ismsplus.php',
            'ismsplus'
        );
    }

    public function provides() : array
    {
        return ['ismsplus'];
    }
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/ismsplus.php' => config_path('ismsplus.php'),
        ], 'ismsplus.config');

    }
}
