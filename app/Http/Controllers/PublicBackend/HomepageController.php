<?php

namespace App\Http\Controllers\PublicBackend;

use App\Http\Controllers\Controller;

use App\View\Pages\Homepage;

class HomepageController extends Controller
{
    public function index()
    {
        $page = new Homepage();

        return $page->render();
    }
}
