<?php

use escuelaempresa\petition;
use escuelaempresa\grade;

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
    return redirect('/home');
});
Route::get('/home', 'HomeController@index')->name('home');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::group(['middleware' => 'auth'], function() {

	// STUDENTS
	Route::get('/students/list', 'StudentController@listAll')->name('liststudents');
	Route::get('/students/add', 'StudentController@addStudent')->name('addStudent');
	Route::delete('/students/remove/{studentId}', 'StudentController@removeStudent')->name('removeStudent');
	Route::post('/student/store', 'StudentController@store')->name('storeStudent');
	Route::post('/students/update', 'StudentController@update')->name('updateStudent');
	Route::get('/students/edit/{studentId}', 'StudentController@edit')->name('editStudent');

	// GRADES
	Route::get('/grades/list', 'GradeController@listAll')->name('listgrades');
	Route::get('/grades/add', 'GradeController@addGrade')->name('addGrade');
	Route::delete('/grades/remove/{gradeId}', 'GradeController@removeGrade')->name('removeGrade');
	Route::post('/grade/store', 'GradeController@store')->name('storeGrade');
	Route::post('/grades/update', 'GradeController@update')->name('updateGrade');
	Route::get('/grades/edit/{gradeId}', 'GradeController@edit')->name('editGrade');
	Route::get('/grades/find/{id}', 'GradeController@find')->name('find');
	Route::post('/grades/findByDate/', 'GradeController@findByDate')->name('findByDate');
	Route::get('/grades/info/{id}', 'GradeController@info')->name('infoGrade');

	// COMPANIES
	Route::get('/companies/', 'CompanyController@index')->name('companyIndex');
	Route::delete('/companies/remove/{company}', 'CompanyController@remove')->name('companyRemove');
	Route::get('/companies/add', 'CompanyController@addForm')->name('companyAddForm');
	Route::post('/companies/', 'CompanyController@store')->name('companyStore');
	Route::get('/companies/edit/{company}', 'CompanyController@editForm')->name('companyEditForm');
	Route::post('/companies/edit/{company}', 'CompanyController@update')->name('companyUpdate');

	// STUDIES
	Route::get('/studies/', 'StudyController@index')->name('studyIndex');
	Route::delete('/studies/remove/{study}', 'StudyController@remove')->name('studyRemove');
	Route::get('/studies/add', 'StudyController@addForm')->name('studyAddForm');
	Route::post('/studies/add', 'StudyController@store')->name('studyStore');
	Route::get('/studies/edit/{study}', 'StudyController@editForm')->name('studyEditForm');
	Route::post('/studies/edit/{study}', 'StudyController@update')->name('studyUpdate');

	// PETITIONS
	Route::get('/petitions/', 'PetitionController@index')->name('petitionIndex');
	Route::delete('/petitions/remove/{petition}', 'PetitionController@remove')->name('petitionRemove');
	Route::get('/petitions/add', 'PetitionController@addForm')->name('petitionAddForm');
	Route::post('/petitions/', 'PetitionController@store')->name('petitionStore');
	Route::get('/petitions/edit/{petition}', 'PetitionController@editForm')->name('petitionEditForm');
	Route::post('/petitions/edit/{petition}', 'PetitionController@update')->name('petitionUpdate');

	define('TYPES', array ('FCT', 'Dual', 'Trabajo'));

	// PDF
	Route::get('grades/edit/pdfGradesTypes/{id}', function($id) {
		$grade = grade::find($id);
		$data = ['gradeName' => $grade->name, 'gradeLevel' => $grade->level, 'petitionTypes' => []];

		foreach ( TYPES as $i => $type ){
			$data['petitionTypes'][$type] = petition::where('id_grade', $id)->where('type', $type)->get();
		}
		
		$pdf = PDF::loadView('pdf.pdfGradesTypes', $data);
		return $pdf->download($grade->name . '(Solicitudes).pdf');
	})->name('pdfGrade');

	Route::get('grades/edit/pdfGradesTypes/{id}/{type}', function($id, $type) {
		$grade = grade::find($id);
		
		$data = [
			'gradeName' => $grade->name, 
			'gradeLevel' => $grade->level
		];

		$data['petitions'] = petition::where('id_grade', $id)->where('type', $type)->get();
		
		$pdf = PDF::loadView('pdf.pdfIndividualType', $data);
		return $pdf->download($grade->name . '(Solicitudes).pdf');
	})->name('pdfGradeTypes');
});