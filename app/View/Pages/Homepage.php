<?php

namespace App\View\Pages;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Page;
use Artesaos\SEOTools\Facades\SEOMeta;

class Homepage extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $page = Page::where('route_name', 'homepage')->first();

        SEOMeta::setTitle($page->seo_title);
        SEOMeta::setDescription($page->seo_description);

        return view('public-theme.templates.pages.homepage.homepage', compact('page'));
    }
}
