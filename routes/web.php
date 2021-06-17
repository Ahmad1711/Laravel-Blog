<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
    return App\category::find(2)->posts;
});
//-------------------Front Routes-------------------------------------
Route::get('/','FrontController@index')->name('index');
Route::get('/post/{slug}', 'FrontController@post')->name('post');
Route::get('/category/{slug}', 'FrontController@category')->name('category');
Route::get('/tag/{slug}', 'FrontController@tag')->name('tag');
Route::get('/user/{id}', 'FrontController@user')->name('user');
Route::get('/search', 'FrontController@search')->name('search');
Route::get('/nextposts/{skip}', 'FrontController@nextposts')->name('nextposts');
//--------------------------------------------------------------------
Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/post/create', 'PostsController@create')->name('post.create');
    Route::get('/post/index', 'PostsController@index')->name('post.index');
    Route::get('/post/edit/{id}', 'PostsController@edit')->name('post.edit');
    Route::get('/post/destroy/{id}', 'PostsController@destroy')->name('post.destroy');
    Route::get('/post/trashed', 'PostsController@trashed')->name('post.trashed');
    Route::get('/post/delete/{id}', 'PostsController@delete')->name('post.delete');
    Route::get('/post/restore/{id}', 'PostsController@restore')->name('post.restore');

    Route::post('/post/store', 'PostsController@store')->name('post.store');
    Route::post('/post/update/{id}', 'PostsController@update')->name('post.update');
   //-------------------------------------------------------------------------------
    Route::get('/category/create', 'CategoriesController@create')->name('category.create');
    Route::get('/category/index', 'CategoriesController@index')->name('category.index');
    Route::get('/category/edit/{id}', 'CategoriesController@edit')->name('category.edit');
    Route::get('/category/destroy/{id}', 'CategoriesController@destroy')->name('category.destroy');

    Route::post('/category/store', 'CategoriesController@store')->name('category.store');
    Route::post('/category/update/{id}', 'CategoriesController@update')->name('category.update');
    //--------------------------------------------------------------------------------
    Route::get('/tag/create', 'TagsController@create')->name('tag.create');
    Route::get('/tag/index', 'TagsController@index')->name('tag.index');
    Route::get('/tag/edit/{id}', 'TagsController@edit')->name('tag.edit');
    Route::get('/tag/destroy/{id}', 'TagsController@destroy')->name('tag.destroy');

    Route::post('/tag/store','TagsController@store')->name('tag.store');
    Route::post('/tag/update/{id}', 'TagsController@update')->name('tag.update');
    //--------------------------------------------------------------------------------
    Route::get('/user/create', 'UsersController@create')->name('user.create');
    Route::get('/user/index', 'UsersController@index')->name('user.index');
    Route::get('/user/admin/{id}','UsersController@admin')->name('user.admin');
    Route::get('/user/notadmin/{id}', 'UsersController@notadmin')->name('user.notadmin');
    Route::get('/user/destroy/{id}', 'UsersController@destroy')->name('user.destroy');

    Route::post('/user/store', 'UsersController@store')->name('user.store');
    //---------------------------------------------------------------------------------
    Route::get('/user/profile','ProfilesController@index')->name('user.profile');
    
    Route::post('/user/profile/update','ProfilesController@update')->name('user.profile.update');
    //---------------------------------------------------------------------------------
    Route::get('/setting/edit','SettingsController@edit')->name('setting.edit');
    Route::post('/setting/update', 'SettingsController@update')->name('setting.update');
});
