<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use app\Post;

class CategoriesController extends Controller
{
  public function index(Category $category)
  {
    $posts = $category->posts;
    $archives = $this->archives();

    return view ('posts.category', compact('posts'));
  }

  public function create ()
  {
    $categories = Category::orderBy('name')->get();

    return view ('posts.createcategory', compact('categories'));
  }

  public function store ()
  {
    Category::create(request(['name']));

    return redirect ('/posts/create');
  }

  private function archives()
   {
      return Post::orderBy('created_at', 'desc')
        ->whereNotNull('created_at')
        ->get()
        ->groupBy(function(Post $post)
        {
          return $post->created_at->format('F');
        })

        ->map(function ($item)
        {
          return $item
          ->sortByDesc('created_at')
          ->groupBy( function ( $item )
          {
            return $item->created_at->format('Y');
          });
        });
    }
}
