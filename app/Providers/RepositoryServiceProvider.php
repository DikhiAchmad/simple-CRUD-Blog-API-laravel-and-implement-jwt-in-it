<?php

namespace App\Providers;

use App\Repository\Blog\BlogPostEloquent;
use App\Repository\Blog\BlogPostInterfaces;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BlogPostInterfaces::class, BlogPostEloquent::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}