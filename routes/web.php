<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\expenseController;
use App\Http\Controllers\employeController;
use App\Http\Controllers\subjectController;
use App\Http\Controllers\classController;

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
////////////////Auth Routing ////////////////////////////////////////
Route::post('login', [adminController::class,'login']);
Route::get('login', [adminController::class,'login']);
Route::get('signup', [adminController::class,'signup']);
Route::post('insert', [adminController::class,'insert']);

////////////////Teacher Routing//////////////////////////////

Route::get('/', [adminController::class,'index']);
Route::get('teachers', [teacherController::class,'index']);
Route::get('add_teacher', [teacherController::class,'add_teacher']);
Route::post('add_teacher', [teacherController::class,'insert']);
Route::get('edit_teacher/{id}', [teacherController::class,'edit_teacher']);
Route::post('update_teacher', [teacherController::class,'update']);
Route::get('delete_teacher/{id}', [teacherController::class,'delete']);

///////////////////////////////////////Students Routing /////////////////////////////////////////////////

Route::get('students', [studentController::class,'index']);
Route::get('add_student', [studentController::class,'add_student']);
Route::post('add_recored', [studentController::class,'insert']);
Route::get('edit_student/{id}', [studentController::class,'edit_student']);
Route::post('update_student', [studentController::class,'update']);
Route::get('delete_student/{id}', [studentController::class,'delete']);

//////////////////////////////////////////////////////////Category Routing//////////////////////////////////////////////////

Route::get('category', [categoryController::class,'index']);
Route::get('add_category', [categoryController::class,'add_category']);
Route::post('add_category', [categoryController::class,'insert']);
Route::get('edit_category/{id}', [categoryController::class,'edit_category']);
Route::post('update_category', [categoryController::class,'update']);
Route::get('delete_category/{id}', [categoryController::class,'delete']);

//////////////////////////////////////////////////////////Expense Routing//////////////////////////////////////////////////

Route::get('expense', [expenseController::class,'index']);
Route::get('add_expense', [expenseController::class,'add_expense']);
Route::post('add_expense', [expenseController::class,'insert']);
Route::get('edit_expense/{id}', [expenseController::class,'edit_expense']);
Route::post('update_expense', [expenseController::class,'update']);
Route::get('delete_expense/{id}', [expenseController::class,'delete']);

///////////////////////////////////////////////////////Employe Routning//////////////////////////////////////////////////////

Route::get('employe', [employeController::class,'index']);
Route::get('add_employe', [employeController::class,'add_employe']);
Route::post('add_employe', [employeController::class,'insert']);
Route::get('edit_employe/{id}', [employeController::class,'edit_employe']);
Route::post('update_employe', [employeController::class,'update']);
Route::get('delete_employe/{id}', [employeController::class,'delete']);

///////////////////////////////////////////////////////Subject Routning//////////////////////////////////////////////////////

Route::get('subject', [subjectController::class,'index']);
Route::get('add_subject', [subjectController::class,'add_subject']);
Route::post('add_subject', [subjectController::class,'insert']);
Route::get('edit_subject/{id}', [subjectController::class,'edit_subject']);
Route::post('update_subject', [subjectController::class,'update']);
Route::get('delete_subject/{id}', [subjectController::class,'delete']);

///////////////////////////////////////////////////////Class Routning//////////////////////////////////////////////////////

Route::get('class', [classController::class,'index']);
Route::get('add_class', [classController::class,'add_class']);
Route::post('add_class', [classController::class,'insert']);
Route::get('edit_class/{id}', [classController::class,'edit_class']);
Route::post('update_class', [classController::class,'update']);
Route::get('delete_class/{id}', [classController::class,'delete']);
