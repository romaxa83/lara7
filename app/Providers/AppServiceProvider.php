<?php

namespace App\Providers;

use App\Patterns\Adapter\Classes\MediaLibraryAdapter;
use App\Patterns\Adapter\Interfaces\MediaLibraryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Query\Builder;

class AppServiceProvider extends ServiceProvider
{

    public $bindings = [
        MediaLibraryInterface::class => MediaLibraryAdapter::class
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::macro('notAdmin', function(): Builder{
            return $this->where('email', '!=', 'admin@admin.com');
        });
    }
}
