<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Models\Page;
use App\Models\Category;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('admin-theme.*', function($view) {

            $pages = Page::all();

            $view->with([
                "pages" => $pages,
            ]);
        });

        View::composer('public-theme.*', function($view) {

            $categories = Category::all();

            $view->with([
                "categories" => $categories,
            ]);
        });

        View::composer('*', function($view) {

            $style_variables = [
                'large-size-min-width' => '1121',
                'medium-size-max-width' => '1120',
                'small-size-max-width' => '800',
                'tiny-size-max-width' => '600',
                'xs-size-max-width' => '480',
            ];
        
            $view->with([
                "style_variables" => $style_variables,
            ]);
        });
    }
}
