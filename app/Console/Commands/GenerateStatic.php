<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\View\Pages\Homepage;
use App\View\Pages\AboutPage;
use App\View\Pages\CategoryPage;
use App\View\Pages\PostPage;

use App\Models\Category;
use App\Models\Post;

class GenerateStatic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-static';

    // php artisan app:generate-static --env=static

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $static_path = public_path().'/static';

        if (is_dir($static_path)) {
            $this->delTree($static_path);
        }

        mkdir($static_path);

        $homepage = new Homepage();

        file_put_contents($static_path.'/index.html', $homepage->render());
        
        $about_path = $static_path.'/about';

        mkdir($about_path);

        $about = new AboutPage();

        file_put_contents($about_path.'/index.html', $about->render());
        
        $categories_path = $static_path.'/categories';

        mkdir($categories_path);

        $categories = Category::all();

        foreach ($categories as $key => $category) {
            $category_path = $categories_path.'/'.$category->id;

            mkdir($category_path);

            $page = new CategoryPage($category->id);

            file_put_contents($category_path.'/index.html', $page->render());
        }
        
        $posts_path = $static_path.'/posts';

        mkdir($posts_path);

        $posts = Post::all();

        foreach ($posts as $key => $post) {
            $post_path = $posts_path.'/'.$post->id;

            mkdir($post_path);

            $page = new PostPage($category->id);

            file_put_contents($post_path.'/index.html', $page->render());
        }
        
    }

    public function delTree($dir) {
     $files = array_diff(scandir($dir), array('.','..'));
      foreach ($files as $file) {
        (is_dir("$dir/$file")) ? $this->delTree("$dir/$file") : unlink("$dir/$file");
      }
      return rmdir($dir);
    }
}
