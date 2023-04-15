<?php

namespace App\View\Pages;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use Artesaos\SEOTools\Facades\SEOMeta;
use App\Models\Post;

class PostPage extends Component
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
        $post = Post::find($this->id);

        SEOMeta::setTitle($post->seo_title);
        SEOMeta::setDescription($post->seo_description);

        return view('public-theme.templates.pages.post.post', compact('post'));
    }
}
