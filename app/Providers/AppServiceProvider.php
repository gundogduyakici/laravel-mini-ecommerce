<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Categories;
use App\Models\Inbox;
use View;

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
        $inbox_count = Inbox::all();
        $categories_menu = Categories::all();

        $data = array(
            'inbox_count' => $inbox_count,
            'categories_menu' => $categories_menu,
        );

        return View::share( 'data', $data );
    }
}
