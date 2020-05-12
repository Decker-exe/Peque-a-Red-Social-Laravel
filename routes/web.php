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

//use App\Publication;

Route::get('/', function () {

     
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/configuracion', 'UserController@config')->name('config');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/crear-publicacion', 'PublicationController@create')->name('publication.create');
Route::post('/publication/save', 'PublicationController@save')->name('publication.save');
Route::get('/publication/file/{filename}', 'PublicationController@getImage')->name('publication.file');
Route::get('/publication/{id}', 'PublicationController@detail')->name('publication.detail');
Route::post('/comment/save', 'CommentController@save')->name('comment.save');
Route::get('/bares', 'barController@create')->name('publication.bar');
Route::get('/boliches', 'bolicheController@create')->name('publication.boliche');
Route::get('/publicacion/editar/{id}', 'PublicationController@edit')->name('publication.edit');
Route::get('/publicacion/delete/{id}', 'PublicationController@delete')->name('publication.delete');

Route::get('/star/{publication_id}', 'StarController@like')->name('star.save');
Route::get('/disstar/{publication_id}', 'StarController@dislike')->name('star.delete');

Route::post('/publication/update', 'PublicationController@update')->name('publication.update');
Route::get('/{search?}', 'UserController@index')->name('user.index');