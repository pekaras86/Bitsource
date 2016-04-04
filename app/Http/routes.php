<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('/', function () {
    return view('home.welcome');
});
*/


//Home Page
//Route::get('/','HomePage@index');
Route::get('welcome','HomePage@index');



//Login - Register
Route::get('login','LoginController@show');
Route::get('register','RegisterController@show');
//Route::get('register', 'Auth\AuthController@getRegis');  // show the register form
//Route::post('register', 'Auth\AuthController@postRegister'); // send register data via post method



//Lists
Route::get('users_list','UsersListController@show');
Route::get('jobs_list','JobsListController@show');
Route::get('tasks_list','TasksListController@show');



//Descriptions
Route::get('task_description','TaskDescriptionController@show');
Route::get('job_description', 'JobDescriptionController@show');
Route::resource('users', 'UserProfileController');



//Contact Form
Route::get('contact', ['as' => 'contact', 'uses' => 'AboutController@create']);
Route::post('contact', ['as' => 'contact_store', 'uses' => 'AboutController@store']); 



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});


