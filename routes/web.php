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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/admin'{{--this is url--}},'AdminController@index'{{--this is controller--}});

Auth::routes();

Route::middleware(['auth'])->group(function()
{
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('addQuestions', 'QuestionsController@addBCSquestion');

	Route::get('allQuestions', 'QuestionsController@allBCSQuestions');

	Route::post('save_question', 'QuestionsController@uploadQuestion');
	
	Route::get('request_question', 'QuestionsController@allBCSQuestions');

	Route::resource('/question','QuestionsController'); //used for go to update and destroy function
});