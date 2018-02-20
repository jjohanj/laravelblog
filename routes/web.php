<?php

Route::get('/', 'PostsController@index');



Route::get('posts/create', 'PostsController@create');

Route::post('/posts', 'PostsController@store');

Route::get('posts/{category}', 'PostsController@sort');

Route::get('posts/show/{id}', 'PostsController@show');

Route::post('/posts/show/{id}/comments', 'CommentsController@store' );

Route::get('posts/create/category', 'PostsController@createcategory');

Route::post('posts/create/category', 'PostsController@storecategory');

Route::delete('/posts/delete/{id}', [
    'as' => 'delete_comment_path', 
    'uses' => 'CommentsController@delete'
]);

Route::get('/logout', 'SessionsController@destroy');
Auth::routes();

//Route::get('/login', 'LoginController@create');
//Route::get('/register', 'RegistrationController@create');

//Route::get('/home', 'HomeController@index')->name('home');
