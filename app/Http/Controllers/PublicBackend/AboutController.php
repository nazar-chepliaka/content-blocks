<?php

namespace App\Http\Controllers\PublicBackend;

use App\Http\Controllers\Controller;

use App\View\Pages\AboutPage;

class AboutController extends Controller
{
    public function index()
    {
        $page = new AboutPage();

        return $page->render();
    }
}
