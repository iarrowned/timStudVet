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

Route::get('/', 'HomeController@index');

Route::get('/about', function (){
    return view('about');
});

Route::get('/cats/{page}', 'CatsController@all')->name('catsCare');
Route::get('/cats/{page}/{category}', 'CatsController@all')->name('catsCareByCategory');
Route::get('/dogs/{page}', 'DogsController@all')->name('dogsCare');
Route::get('/dogs/{page}/{category}', 'DogsController@all')->name('dogsCareByCategory');

Route::get('/cats/{page}/{category}/{post}', 'CatsController@post')->name('catsPost');
Route::get('/dogs/{page}/{category}/{post}', 'DogsController@post')->name('dogsPost');



Auth::routes();
Route::get('admin/categories/{cat}/{id}', 'CategoryController@delete')->name('catDelete');
Route::get('admin/categories/edit/{cat}/{id}', 'CategoryController@update')->name('catEdit');
Route::post('admin/categories/{cat}/create', 'CategoryController@createCategory')->name('catCreate');
Route::post('admin/categories/edit/{cat}/{id}', 'CategoryController@updateSubmit')->name('catEditSubmit');
Route::get('admin/posts', 'PostController@index')->name('admPosts');
Route::get('admin/posts/{cat}/{id}', 'PostController@show')->name('showPost');
Route::get('admin/posts/{cat}/{id}/del', 'PostController@delete')->name('deletePost');
Route::get('admin/posts/{cat}/{id}/update', 'PostController@update')->name('updatePost');
Route::post('admin/posts/{cat}/{id}/update', 'PostController@updateSubmit')->name('updatePostSubmit');
Route::get('admin/post/{cat}/add', 'PostController@addPost')->name('addPost');
Route::post('admin/post/{cat}/add', 'PostController@addPostSubmit')->name('addPostSubmit');

Route::get('/quest', 'QueController@index')->name('quest');
Route::post('/quest', 'QueController@QuestSubmit')->name('questSubmit');


Route::get('/admin/answer', 'AnsController@show')->name('answers');
Route::get('/admin/answer/{id}', 'AnsController@ans')->name('ans');

Route::post('/admin/answer/{id}', 'AnsController@ansSubmit')->name('ansSubmit');
Route::get('/admin/answer/{id}/delete', 'AnsController@deleteQuest')->name('deleteQuest');
Route::get('/admin/answer/{id}/update', 'AnsController@updateAnswer')->name('updateAnswer');
Route::post('/admin/answer/{id}/update', 'AnsController@updateAnswerSubmit')->name('updateAnswerSubmit');

