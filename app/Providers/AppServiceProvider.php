<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Carbon::setLocale('fr');
        setlocale(LC_TIME, 'fr_FR.utf8','fr');

        view()->composer('base/app',function($view){

            $view->with([
                    'menu_brand' =>Brand::select('id','name','slug')->limit(5)->get(),
                    'menu_categorie'=> Category::select('id','title', 'slug')->limit(5)->orderBy('id')->get()

                ]);
        });
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
}
