<?php

namespace App\Providers;

use Schema;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(Schema::hasTable('announcements') && Schema::hasTable('categories'))
        {
            $announcements = Announcement::all();
            $categories = Category::all();
            View::share('categories',$categories);
            View::share('announcements',$announcements);
        }
        
        Paginator::useBootstrapFive();
        //Paginator::useBootstrapFour();
    }
}
