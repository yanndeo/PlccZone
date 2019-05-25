<?php


namespace App\Repositories;

use App\Repositories\contrats\BrandInterface;
use App\Repositories\contrats\CategoryInterface;

use App\Repositories\contrats\ProductInterface;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            CategoryInterface::class,
            CategoryRepository::class
        );

        $this->app->bind(
            BrandInterface::class,
            BrandRepository::class
        );

        $this->app->bind(
            ProductInterface::class,
            ProductRepository::class
        );
    }

}