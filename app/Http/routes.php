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

//Dilwnw gia kathe request tou xristi ton antistixo controller pou tha ton exipiretisei
// i diaforetika gia kathe view pou tha zitithei ton antistixo controller pou tha to servirei

//kalos tropos gia statikes selides
//gia tin home page synithos
/*
Route::get('/', function () {
    return view('home.welcome');
});
*/

//kata to request tou home page me methodo get servire to apotelesma sto xristi me 
//ton WellcomeController kai ti methodo index
Route::get('/','HomePage@index');

Route::get('login','LoginController@show');

Route::get('register','RegisterController@show');

Route::get('freelancers','FreelancersController@show');

Route::get('jobs','JobsController@show');

Route::get('tasks','TasksController@show');

Route::get('task','TaskController@show');

Route::get('freelancer_profile', 'FreelancerProfileController@show');

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
