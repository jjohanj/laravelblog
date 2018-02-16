<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostsController extends Controller
{
    public function index()
    {
      $posts = Post::latest()->get();
      $categories = Post::select('category')->distinct()->get();
      return view('posts.index', compact('posts', 'categories'));
    }

    public function show($id)
    {
      $posts = Post::where('id', $id)->get();
      
      return view('posts.show', compact('posts'));
    }

    public function create ()
  {
    $categories = Category::get();
    
      return view ('posts.create', compact('categories'));
  }

     public function store ()
    {
      Post::create(request(['title', 'body', 'category']));

      return redirect ('/');
    }


public function createcategory ()
  {
    $categories = Category::get();
    
      return view ('posts.createcategory', compact('categories'));
  }

  public function storecategory ()
  {
    Category::create(request(['name']));
    
     return redirect ('http://testsite.test/posts/create');
  }

    public function sort($category)
    {
      $posts = Post::latest()->where('category', $category)->get();
      $categories = Post::select('category')->distinct()->get();
      return view('posts.category', compact('posts', 'categories'));
    }


}
