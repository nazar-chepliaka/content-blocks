<?php

namespace App\Http\Controllers\PublicBackend;

use App\Http\Controllers\Controller;

use App\View\Pages\PostPage;

class PostsController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $page = new PostPage($id);

        return $page->render();
    }
}
