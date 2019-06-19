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

Route::get('/home', 'HomeController@index')->middleware('locale');
Route::get('/getStudentSubjects', 'StudentController@getSubjects');

Route::get('/student/add', 'StudentController@create')->name('addStudent');
Route::post('/student/add', 'StudentController@store')->name('storeStudent');

Route::get('student/edit/{id}', 'StudentController@edit')->name('editStudent');
Route::post('student/edit/{id}', 'StudentController@update')->name('updateStudent');
Route::post('student/delete', 'StudentController@delete')->name('deleteStudent');

Route::get('group/edit/{id}', 'GroupController@edit')->name('editGroup');
Route::post('group/edit/{id}', 'GroupController@update')->name('updateGroup');
Route::post('group/delete', 'GroupController@delete')->name('deleteGroup');


Route::get('/group/add', 'GroupController@create')->name('addGroup');
Route::post('/group/add', 'GroupController@store')->name('storeGroup');

Route::get('group/ajaxStudent', 'GroupController@ajax')->name('ajaxGetStudent');

Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('change-language');



