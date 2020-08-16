<?php

namespace App\Providers;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Contracts\Foundation\Application;

class ElasticsearchProvider extends ServiceProvider
{
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }

    public function register()
    {
        $this->app->singleton(Client::class,
            function (Application $app) {
                $config = $app->make('config')->get('elasticsearch');

                return ClientBuilder::create()
                    ->setHosts($config['hosts'])
                    ->setRetries($config['retries'])
                    ->build();
            }
        );
    }
}
