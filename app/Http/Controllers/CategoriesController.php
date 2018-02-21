<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoriesController extends Controller
{
    public function index(Category $category)
    {
      $posts = $category->posts;

      return view ('posts.index', compact('posts'));
    }
}
