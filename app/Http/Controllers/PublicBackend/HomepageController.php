<?php

namespace App\Http\Controllers\PublicBackend;

use Artesaos\SEOTools\Facades\SEOMeta;

use App\Http\Controllers\Controller;
use App\Models\Page;

class HomepageController extends Controller
{
    public function index()
    {
        $page = Page::where('route_name', 'homepage')->first();

        SEOMeta::setTitle($page->seo_title);
        SEOMeta::setDescription($page->seo_description);

        return view('public-theme.templates.pages.homepage.homepage', compact('page'));
    }
}
