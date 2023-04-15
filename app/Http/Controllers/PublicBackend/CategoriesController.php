<?php

namespace App\Http\Controllers\PublicBackend;

use App\Http\Controllers\Controller;

use App\View\Pages\CategoryPage;

class CategoriesController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $page = new CategoryPage($id);

        return $page->render();
    }
}
