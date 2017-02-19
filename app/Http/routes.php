<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', "WelcomeController@index") ;

Route::get('masterclass/{id}/addCours' , 'MasterclassController@createCours') ;
Route::get('masterclass/{id}/addConcert' , 'MasterclassController@createConcert') ;

Route::post('concert/addMusic' , 'ConcertsController@addMusic') ;

Route::post('masterclass/subscribe/{masterclass}' , 'MasterclassController@subscribe') ;
Route::post('concert/subscribe/{concert_music}/{user}/{instrument}' , 'ConcertsController@subscribe') ;
Route::post('subscription/registration/{masterclass}/{user}/{response}' , 'SubscriptionsController@responseSubscription') ;
Route::get('user/{id}/updateTo' , 'UsersController@updateTo') ;

Route::get('editAccount' , ['uses' => 'UsersController@editAccount' , 'as' => 'editAccount' ])  ;

Route::resource('masterclass' , 'MasterclassController') ;
Route::resource('cours' , 'CoursController') ;
Route::resource('concert' , 'ConcertsController') ;
Route::resource('user' , 'UsersController') ;
Route::resource('post' , 'PostsController') ;
Route::resource('instrument' , 'InstrumentsController') ;
Route::resource('music' , 'MusicsController') ;
Route::resource('theme' , 'ThemesController') ;

Route::resource('subscription' , 'SubscriptionsController') ;


Route::auth();

Route::get('/home', 'HomeController@index');

