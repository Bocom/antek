<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Torchlight\Commonmark\V2\TorchlightExtension;

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
    public function boot()
    {
        if (! empty(config('torchlight.token'))) {
            $extensions = config('markdown.extensions');
            $extensions[] = TorchlightExtension::class;
            config(['markdown.extensions' => $extensions]);
        }
    }
}
