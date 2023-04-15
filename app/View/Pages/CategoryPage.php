<?php

namespace App\View\Pages;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use Artesaos\SEOTools\Facades\SEOMeta;
use App\Models\Category;

class CategoryPage extends Component
{
    public $id;

    /**
     * Create a new component instance.
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $current_category = Category::find($this->id);

        SEOMeta::setTitle($current_category->seo_title);
        SEOMeta::setDescription($current_category->seo_description);

        return view('public-theme.templates.pages.category.category', compact('current_category'));
    }
}
