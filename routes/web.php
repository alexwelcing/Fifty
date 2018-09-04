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

//Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');



Route::get('/', function () {
    return redirect('login');
});



//admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
	
	//dashboard 
	Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard.index');
	
	//states
	Route::resource('/states', 'Admin\StatesController');

	//categories
	Route::resource('/categories', 'Admin\CategoriesController');

	//datas
	Route::resource('/datas', 'Admin\DatasController');
	Route::resource('/users', 'Admin\UserController');
	Route::resource('/questions', 'Admin\QuestionController');
	Route::resource('/statesthreefourty', 'Admin\threefourtyB\StatesthreefourtyController');
	
	Route::resource('/statesthreefourty', 'Admin\threefourtyB\StatesthreefourtyController');
	Route::resource('/uploadcsv','Admin\UploadcsvController');
	Route::resource('/uploadstatecsv','Admin\UploadStatesController');
	Route::resource('/maps','Admin\MapdatasController');
	Route::group(['prefix' => 'datas/{data}'], function () {
		//faqs
		Route::resource('/faqs', 'Admin\FaqsController');
	});
     Route::group(['prefix' => 'statesthreefourty/{statesthreefourty}'], function () {
		//sections
		Route::resource('/sections', 'Admin\threefourtyB\SectionController');


     Route::group(['prefix' => 'sections/{section}'], function () {
	
		Route::resource('/sectionsdata', 'Admin\threefourtyB\SectiondataController');
	});


	});
  
		//sections
		
	



	//only for admin
	//admin permissions
	Route::group(['middleware' => 'check-permission:admin'], function () {
		//cities
		Route::resource('/cities', 'Admin\CitiesController');
	});


	

});

