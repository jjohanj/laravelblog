<?php

Route::get('/dump', 'RoleController@dump');

//read/show posts
Route::get('/', 'PostsController@index');

Route::get('/all', 'PostsController@showAll');

Route::get('posts/show/{id}', 'PostsController@show');

Route::get('posts/user/{id}', 'PostsController@FromUser');

Route::post('/posts/search/', 'PostsController@search' );

Route::get('sitemap', 'SitemapController@show');

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

//ratings and votes
Route::post('show/vote','PostsController@vote');

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

Route::post('/paymentdetails', 'RoleController@handlePayment');

Route::get('/upgradepayment', 'RoleController@showpayment');

Route::post('/upgradesubscription', 'RoleController@upgrade');

Route::get('/cancelsubscription', 'RoleController@showDowngrade');

Route::post('/cancelsubscription', 'RoleController@downgrade');



Auth::routes();

//User settings
Route::get('settings', 'ProfileController@settings');

Route::post('/updateNotifications', 'SettingsController@updatemail');


Route::patch('/profile/image', 'ProfileController@updateImage');


Route::patch('/profile/header', 'ProfileController@updateHeader');

Route::get('/{locale}', 'LanguageController@switchLang');


//Users;followers
Route::get('/user/{username}', 'ProfileController@show');

Route::post('profile/{profileId}/follow', 'ProfileController@followUser')->name('user.follow');

Route::post('/{profileId}/unfollow', 'ProfileController@unFollowUser')->name('user.unfollow');

//Admin/Owner
Route::get('/profile/excel', 'RoleController@createExcel');

Route::get('/profile/export', 'ProfileController@print');

Route::get('/dump', 'RoleController@dump');

Route::get('/settings/stats', 'RoleController@stats');



//Route::get('/login', 'LoginController@create');
//Route::get('/register', 'RegistrationController@create');

//Route::get('/home', 'HomeController@index')->name('home');
