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

// main route
Route::get('/', array('uses' => 'UsersController@showBlogList'));

// route to show archive page
Route::get('/archive', array('uses' => 'UsersController@showPaginatedBlogList'));

// rout to show singe plage
Route::get('/single/{id}', array('uses' => 'UsersController@showSingle'));

// route to show the admin login form
Route::get('/login', array('uses' => 'AdminsController@showLogin'));

// route to process the login form
Route::post('/login', array('uses' => 'AdminsController@doLogin'));

// route to show the admin blog list
Route::get('/admin-list', array('uses' => 'AdminsController@showBlogList'));

// route to show the admin blog post form
Route::get('/admin-post/{id}', array('uses' => 'AdminsController@showBlogPost'));

// route to process admin the blog post form
Route::post('/admin-post/{id}', 'AdminsController@doBlogPost');

// create a route of uploaded images to storage folder
Route::get('/uploads/{filename}', function ($filename)
{
    $path = storage_path() . '/app/public/uploads/' . $filename;

    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('image');




