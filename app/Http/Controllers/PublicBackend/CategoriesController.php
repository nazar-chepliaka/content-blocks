<?php

namespace App\Http\Controllers\PublicBackend;

use Artesaos\SEOTools\Facades\SEOMeta;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        SEOMeta::setTitle($category->seo_title);
        SEOMeta::setDescription($category->seo_description);

        return view('public-theme.templates.pages.category.category', compact('category'));
    }
}
