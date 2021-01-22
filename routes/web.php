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
Route::get('/', 'FrontController@index');
Route::get('curso/{slug}','FrontController@curso')->name('curso');
Route::post('datasender', 'FrontController@dataSender')->name('datasender');
Auth::routes();
Route::group(['prefix'=>'panel','middleware'=>'auth'],function(){
	Route::get('logout', 'Auth\LoginController@logout')->name('logout');
	Route::get('/', 'HomeController@index')->name('home');

	Route::get('instructor', 'InstructorController@index'); //Listado de docentes
    Route::get('instructor/create', 'InstructorController@create'); //Agregar nuevo docente
    Route::post('instructor', 'InstructorController@store'); //Graba una nueva categoría
    Route::get('instructor/{id}/edit', 'InstructorController@edit'); //Editar docente
    Route::put('instructor/{id}', 'InstructorController@update'); //Graba actualización de docente
	Route::delete('instructor/{id}/destroy', 'InstructorController@destroy'); //Eliminar docente
	
	Route::get('courses', 'CourseController@index'); //Listado de Cursos
    Route::get('courses/create', 'CourseController@create'); //Agregar nuevo Curso
    Route::post('courses', 'CourseController@store'); //Graba un nuevo curso
    Route::get('courses/{id}/edit', 'CourseController@edit'); //Editar curso
    Route::put('courses/{id}', 'CourseController@update'); //Graba actualización de curso
    Route::delete('courses/{id}/destroy', 'CourseController@destroy'); //Eliminar el curso

    Route::get('courses/{id}/addprice', 'CourseController@managePrice'); //Listado de Precio por Curso
    Route::post('courses/addprice', 'CourseController@addPrice'); //Agregar Precio por Curso
    Route::delete('courses/{id}/addprice/{precio_id}', 'CourseController@destroyPrice'); //Eliminar Precio del Curso

    Route::get('courses/{id}/addmodule', 'CourseController@manageModule'); //Listado de Módulos por Curso
    Route::post('courses/addmodule', 'CourseController@addModule'); //Agregar Módulo a Curso
    Route::delete('courses/{id}/addmodule/{module_id}', 'CourseController@destroyModule'); //Eliminar Modulo del Curso

    Route::get('courses/{id}/addbenefit', 'CourseController@manageBenefit'); //Listado de Beneficios por Curso
    Route::post('courses/addbenefit', 'CourseController@addBenefit'); //Agregar Beneficio a Curso
    Route::delete('courses/{id}/addbenefit/{benefit_id}', 'CourseController@destroyBenefit'); //Eliminar Beneficio del Curso
});
