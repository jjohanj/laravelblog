<?php

Route::get('/', 'PostsController@index');

Route::get('posts/create', 'PostsController@create');

Route::post('/posts', 'PostsController@store');

Route::get('posts/{category}', 'PostsController@sort');

Route::get('posts/show/{id}', 'PostsController@show');

Route::post('/posts/show/{id}/comments', 'CommentsController@store' );

route::get('posts/create/category', 'PostsController@createcategory');

route::post('posts/create/category', 'PostsController@storecategory');

Route::delete('/posts/delete/{id}', [
    'as' => 'delete_comment_path', 
    'uses' => 'CommentsController@delete'
]);

