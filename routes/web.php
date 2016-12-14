<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/login', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');



Route::get('/', ['as'=>'home','uses'=>'HomeController@index']);
Route::get('/category/{id}',['as'=>'category','uses'=>'HomeController@home']);
Route::get('/advert/{slug}', ['as'=>'advert','uses'=>'HomeController@advert']);
Route::get('/show', ['as'=>'show','uses'=>'AuthorController@show']);
// Route::get('/upload', ['as'=>'upload','uses'=>'RegisterUsersController@create']);
Route::group(['middleware'=>'admin'],function(){

	Route::get('/admin','AdminController@index');

		


	Route::resource('admin/users','AdminUsersController',['names'=>[
		'index'=>'admin.users.index',
		'create'=>'admin.users.create',
		'store'=>'admin.users.store',
		'edit'=>'admin.users.edit'
	]]);

	Route::resource('admin/advert','AdminAdvertController',['names'=>[
		'index'=>'admin.advert.index',
		'create'=>'admin.advert.create',
		'store'=>'admin.advert.store',
		'edit'=>'admin.advert.edit'		
	]]);

	Route::resource('admin/categories','AdminCategoriesController',['names'=>[
		'index'=>'admin.categories.index',
		'create'=>'admin.categories.create',
		'store'=>'admin.categories.store',
		'edit'=>'admin.categories.edit'
	]]);

	

	Route::resource('admin/upload','AdminUploadController',['names'=>[
		'create'=>'admin.upload.create',
		'index'=>'admin.upload.index',
		'store'=>'admin.upload.store',
		'edit'=>'admin.upload.edit'
	
	]]);

	


});

Route::resource('admin/media','AdminPhotoController',['names'=>[
		'index'=>'admin.media.index',
		'create'=>'admin.media.create',
		'store'=>'admin.media.store',
		'edit'=>'admin.media.edit'
		
	]]);
	
	
	Route::resource('admin/comments','AdminCommentsController',['names'=>[
		'index'=>'admin.comments.index',
		'create'=>'admin.comments.create',
		'store'=>'admin.comments.store',
		'edit'=>'admin.comments.edit'
	]]);

	Route::resource('admin/comment/replies','AdminCommentRepliesController',['names'=>[
		'show'=>'admin.replies.show',
		'create'=>'admin.replies.create',
		'store'=>'admin.replies.store',
		'edit'=>'admin.replies.edit'

	]]);


	

Route::group(['middleware'=>'author'],function(){

Route::resource('author','AuthorController',['names'=>[
		'create'=>'author.create',
		'store'=>'author.store'
	]]);





});

Route::resource('home/messages','MessagesController',['names'=>[
		'show'=>'home.message.show',
		'create'=>'home.message.create',
		'index'=>'home.message.index',
		'store'=>'home.message.store'	
	]]);

	Route::resource('home/messages/replies','MsgRepliesController',['names'=>[
		'show'=>'home.replies.show',
		'create'=>'home.replies.create',
		'index'=>'home.replies.index',
		'store'=>'home.replies.store'	
	]]);






