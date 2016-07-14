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


//Home Page
Route::get('search', 'HomeSearchController@index');  //home page without sign in


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

Route::group(['middleware' => 'web'], function () {
    
    Route::auth();  // ypefthino gia ta register kai login
    
    Route::get('/home', 'HomeController@index');

    //Contact Form
    Route::get('contact', ['as' => 'contact', 'uses' => 'AboutController@create']);  
    Route::post('contact', ['as' => 'contact_store', 'uses' => 'AboutController@store']); 

    //Lists
    Route::get('users_list','UsersListController@show'); 
    Route::get('jobs_list','JobsListController@show');  
    Route::get('tasks_list','TasksListController@show');  

    //Descriptions
    Route::get('task_description','TaskDescriptionController@show'); 
    Route::get('job_description', 'JobDescriptionController@show'); 
    Route::resource('profile', 'UserProfileController');

    Route::post('rate', 'UserRatingController@setRating');
    
    //Test Route
    /*Route::post('category', function() {

    });*/

});






