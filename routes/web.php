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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// STUDENTS
Route::get('/students/list', 'StudentController@listAll')->name('liststudents');
Route::get('/students/add', 'StudentController@addStudent')->name('addStudent');
Route::delete('/students/remove/{studentId}', 'StudentController@removeStudent')->name('removeStudent');
Route::post('/student/store', 'StudentController@store')->name('storeStudent');
Route::post('/students/update', 'StudentController@update')->name('updateStudent');
Route::get('/students/edit/{studentId}', 'StudentController@edit')->name('editStudent');