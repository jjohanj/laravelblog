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
      
      $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
      ->groupBy('year', 'month')
      ->orderByRaw('min(created_at)')
      ->get()
      ->toArray();

      return view ('posts.index', compact('posts', 'archives'));
    }

   public function create ()
  {
    $categories = Category::get();
    
    return view ('posts.createcategory', compact('categories'));
  }

    public function store ()
  {
    Category::create(request(['name']));

    return redirect ('/posts/create');
  }


}
