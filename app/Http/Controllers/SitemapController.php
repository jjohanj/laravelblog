<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class SitemapController extends Controller
{
  public function show()
  {
    $url = env('APP_URL');
    $posts = Post::all();
    $categories = Category::all();
    return response()->view('posts.sitemap', compact('posts', 'categories', 'url'))->header('Content-Type', 'text/xml');
  }
}
