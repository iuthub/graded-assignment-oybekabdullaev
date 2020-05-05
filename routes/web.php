<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [
  'uses' => 'TasksController@getIndex',
  'as' => 'index'
]);


Route::group([
  'prefix'=>'admin'
], function() {

    Route::get('/', [
      'uses' => 'TasksController@getAdminIndex',
      'as' => 'adminIndex'
    ]);

    Route::get('/edit/{id}', [
      'uses' => 'TasksController@getAdminEdit',
      'as' => 'adminEdit'
    ]);

    Route::post('/edit', [
      'uses' => 'TasksController@postAdminEdit',
      'as' => 'adminEditPost'
    ]);
    
    Route::get('/delete/{id}', [
      'uses' => 'TasksController@getAdminDelete',
      'as' => 'adminDelete'
    ]);

    Route::post('/', [
      'uses' => 'TasksController@postAdminCreate',
      'as' => 'adminCreatePost'
    ]);
});
