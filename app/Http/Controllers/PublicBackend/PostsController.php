<?php

namespace App\Http\Controllers\PublicBackend;

use Artesaos\SEOTools\Facades\SEOMeta;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);

        SEOMeta::setTitle($post->seo_title);
        SEOMeta::setDescription($post->seo_description);

        $category = $post->category;

        return view('public-theme.templates.pages.post.post', compact('post', 'category'));
    }
}
