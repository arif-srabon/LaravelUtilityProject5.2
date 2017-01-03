<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use mjanssen\BreadcrumbsBundle\Breadcrumbs;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composer();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function composer(){
        View::composer('layouts.breadcrumbs', function() {

            $data = [
                'global_breadcrumbs' => Breadcrumbs::automatic()
            ];

            view()->share($data);
        });
    }
}
