<?php

Route::get('/', 'PostsController@index');

Route::get('/user/{username}', 'PostsController@fromUser');

Route::get('posts/create', 'PostsController@create');

Route::post('/posts', 'PostsController@store');

Route::get('posts/show/{id}', 'PostsController@show');
Route::get('posts/user/{id}', 'PostsController@FromUser');

Route::post('/posts/search/', 'PostsController@search' );

Route::post('/posts/show/{id}/comments', 'CommentsController@store' );

Route::get('/categories/{category}', 'CategoriesController@index');

Route::get('posts/create/category', 'CategoriesController@create');

Route::post('posts/create/category', 'CategoriesController@store');

Route::delete('/posts/delete/{id}', [
    'as' => 'delete_comment_path',
    'uses' => 'CommentsController@delete'
]);

Route::post('profile/{profileId}/follow', 'ProfileController@followUser')->name('user.follow');
Route::post('/{profileId}/unfollow', 'ProfileController@unFollowUser')->name('user.unfollow');
Route::get('/{profileId}/show', 'ProfileController@show');
Route::get('/logout', 'SessionsController@destroy');
Auth::routes();

//Route::get('/login', 'LoginController@create');
//Route::get('/register', 'RegistrationController@create');

//Route::get('/home', 'HomeController@index')->name('home');
