<?php

namespace App\Providers;

// use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
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
    // public function boot(Charts $charts)
    public function boot()
    {
        // $charts->register([
        //     \App\Charts\ReportsChart::class
        // ]);
        config(['app.locale' => 'id']);
        \Carbon\Carbon::setLocale('id');
    }
}
