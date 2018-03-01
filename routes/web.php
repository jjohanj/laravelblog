<?php

<<<<<<< HEAD
App::bind('App\Billing\Stripe', function() {
return new \App\Billing\Stripe(config('services.stripe.secret'));

});

$stripe = App::make('App\Billing\Stripe');
dd($stripe);

Route::get('/', 'PostsController@index');
Route::get('settings', 'ProfileController@settings');
Route::get('info', 'ProfileController@info');
Route::get('/user/{username}', 'ProfileController@show');
Route::get('/all', 'PostsController@showAll');

Route::get('/upgradesubscription', 'RoleController@showUpgrade');
Route::post('/upgradesubscription', 'RoleController@upgrade');
Route::get('/cancelsubscription', 'RoleController@showDowngrade');
Route::post('/cancelsubscription', 'RoleController@downgrade');

Route::get('posts/create', 'PostsController@create');

Route::post('/posts', 'PostsController@store');

=======

//read/show posts
Route::get('/', 'PostsController@index');

Route::get('/all', 'PostsController@showAll');

>>>>>>> 197cac121c58e31b785aa133495de658041caf41
Route::get('posts/show/{id}', 'PostsController@show');

Route::get('posts/user/{id}', 'PostsController@FromUser');

Route::post('/posts/search/', 'PostsController@search' );

//create update delete blogposts
Route::post('/posts', 'PostsController@store');

Route::get('posts/create', 'PostsController@create');

Route::get('/edit/post/{id}','PostsController@edit');

Route::patch('/edit/post/{id}','PostsController@update');

Route::delete('/delete/post/{id}','PostsController@destroy');

//categories
Route::get('/categories/{category}', 'CategoriesController@index');

Route::get('posts/create/category', 'CategoriesController@create');

Route::post('posts/create/category', 'CategoriesController@store');

//comments
Route::post('/posts/show/{id}/comments', 'CommentsController@store' );

Route::delete('/posts/delete/{id}', [
    'as' => 'delete_comment_path',
    'uses' => 'CommentsController@delete'
]);

//User
Route::get('info', 'ProfileController@info');



Route::get('/changepassword', 'SessionsController@changepassword');

Route::post('/changepassword', 'RegistrationController@edit');

Route::get('/logout', 'SessionsController@destroy');

Route::get('/upgradesubscription', 'RoleController@showUpgrade');

Route::post('/upgradesubscription', 'RoleController@upgrade');

Route::get('/cancelsubscription', 'RoleController@showDowngrade');

Route::post('/cancelsubscription', 'RoleController@downgrade');

Route::get('/profile/image', 'ProfileController@setImage');

Route::patch('/profile/image', 'ProfileController@update');

Route::get('/profile/excel', 'RoleController@createExcel');

Auth::routes();

//User settings
Route::get('settings', 'ProfileController@settings');

Route::post('/updateNotifications', 'SettingsController@updatemail');

//Users;followers
Route::get('/user/{username}', 'ProfileController@show');

Route::post('profile/{profileId}/follow', 'ProfileController@followUser')->name('user.follow');

Route::post('/{profileId}/unfollow', 'ProfileController@unFollowUser')->name('user.unfollow');



//Route::get('/login', 'LoginController@create');
//Route::get('/register', 'RegistrationController@create');

//Route::get('/home', 'HomeController@index')->name('home');
