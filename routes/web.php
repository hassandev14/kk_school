<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\expenseController;
use App\Http\Controllers\employeController;
use App\Http\Controllers\subjectController;
use App\Http\Controllers\myClassController;
use App\Http\Controllers\studentClassesController;
use App\Http\Controllers\attendenceContoller;
use App\Http\Controllers\studentsFeePaidController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\teacherSalaryPaidController;
use App\Http\Controllers\class_feeController;
use App\Http\Controllers\teachersSalaryCntroller;
use App\Http\Controllers\studentFeeController;
use App\Http\Controllers\examController;

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
Route::get('dashboard', [dashboardController::class,'index']);
Route::post('dashboard', [dashboardController::class,'index']);

////////////////Auth Routing ////////////////////////////////////////
Route::get('/', [adminController::class,'index']);
Route::get('login', [adminController::class,'index']);
Route::post('login', [adminController::class,'login']);
Route::get('signup', [adminController::class,'signup']);
Route::post('insert', [adminController::class,'insert']);
Route::get('logout', [adminController::class,'logout']);
Route::get('profile', [adminController::class,'profile']);
Route::post('update_admin', [adminController::class,'update_admin']);

////////////////Teacher Routing//////////////////////////////

Route::group(['middleware'=>'LoginMiddleware'],function(){
    Route::get('teachers', [teacherController::class,'index']);
    Route::get('add_teacher', [teacherController::class,'add_teacher']);
    Route::post('add_teacher', [teacherController::class,'insert']);
    Route::get('edit_teacher/{id}', [teacherController::class,'edit_teacher']);
    Route::post('update_teacher', [teacherController::class,'update']);
    Route::get('delete_teacher/{id}', [teacherController::class,'delete']);
    Route::get('delete_all_record', [teacherController::class,'delete_all']);

///////////////////////////////////////Students Routing ////////////////////////////////////////////////////////////
Route::get('students', [studentController::class,'index']);
Route::get('add_student', [studentController::class,'add_student']);
Route::post('add_recored', [studentController::class,'insert']);
Route::get('edit_student/{id}', [studentController::class,'edit_student']);
Route::post('update_student', [studentController::class,'update']);
Route::get('delete_student/{id}', [studentController::class,'delete']);
Route::get('get_students', [studentController::class,'get_students']);
Route::get('get_students_for_fee', [studentController::class,'get_students_for_fee']);

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

Route::get('employe', [employeController::class,'index'])->middleware(['LoginMiddleware']);
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

Route::get('our_class', [myClassController::class,'index']);
Route::get('add_class', [myClassController::class,'add_class']);
Route::post('add_class', [myClassController::class,'insert']);
Route::get('edit_class/{id}', [myClassController::class,'edit_class']);
Route::post('update_class', [myClassController::class,'update']);
Route::get('delete_class/{id}', [myClassController::class,'delete']);

///////////////////////////////////////////////////////Student Routning//////////////////////////////////////////////////////

Route::get('student_classes', [studentClassesController::class,'index']);
Route::get('add_student_classes/{id}', [studentClassesController::class,'add_student_classes']);
Route::post('add_student_classes', [studentClassesController::class,'insert']);
Route::get('edit_student_classes/{id}', [studentClassesController::class,'edit_student_classes']);
Route::post('update_student_classes', [studentClassesController::class,'update']);
Route::get('delete_student_classes/{id}', [studentClassesController::class,'delete']);
Route::get('student_class_history/{id}', [studentClassesController::class,'student_class_history']);
Route::get('student_class_history', [studentClassesController::class,'all_student_class']);

///////////////////////////////////////////////////////Attendence Routning//////////////////////////////////////////////////////

Route::get('attendence', [attendenceContoller::class,'index']);
Route::get('add_attendence', [attendenceContoller::class,'add_attendence']);
Route::get('see_attendence', [attendenceContoller::class,'see_attendence']);
Route::post('attendence_save', [attendenceContoller::class,'attendence_save']);

///////////////////////////////////////////////////////Student Fees Routning//////////////////////////////////////////////////////
Route::get('student_fee_paid', [studentsFeePaidController::class,'student_fee_paid']);
Route::get('see_students_fee_paid', [studentsFeePaidController::class,'see_students_fee_paid']);
Route::post('student_fee_save_paid', [studentsFeePaidController::class,'student_fee_paid_save']);
Route::get('add_students_fee_paid', [studentsFeePaidController::class,'add_students_fee_paid']);
Route::post('add_students_fee_paid', [studentsFeePaidController::class,'add_students_fee_paid']);

///////////////////////////////////////////////////////////////Teacher Salary Routing///////////////////////////////////////////////
Route::get('teacher_salary_paid', [teacherSalaryPaidController::class,'index']);
Route::post('add_teacher_salary_paid', [teacherSalaryPaidController::class,'insert']);
Route::get('add_teacher_salary_paid', [teacherSalaryPaidController::class,'add_teacher_salary_paid']);
Route::get('edit_teacher_salary_paid/{id}', [teacherSalaryPaidController::class,'edit_teacher_salary_paid']);
Route::post('update_teacher_salary_paid', [teacherSalaryPaidController::class,'update']);
Route::get('delete_teacher_salary_paid/{id}', [teacherSalaryPaidController::class,'delete']);

///////////////////////////////////////////////////////////////Class Fee Routing///////////////////////////////////////////////
Route::get('add_class_fee/{id}', [class_feeController::class,'index']);
Route::get('class_fee_history/{id}', [class_feeController::class,'fee_history']);
Route::POST('add_class_fee', [class_feeController::class,'insert']);
Route::get('class_fee_history', [class_feeController::class,'class_fee']);

///////////////////////////////////////////////////////////////Teacher Salary Routing///////////////////////////////////////////////
Route::get('add_teacher_salary/{id}', [teachersSalaryCntroller::class,'index']);
Route::get('teacher_salary_history/{id}', [teachersSalaryCntroller::class,'salary_history']);
Route::post('add_teacher_salary', [teachersSalaryCntroller::class,'insert']);
Route::get('teacher_salary_history', [teachersSalaryCntroller::class,'teacher_salary']);

///////////////////////////////////////////////////////////////Teacher Salary Routing///////////////////////////////////////////////
Route::get('add_student_fee/{id}', [studentFeeController::class,'index']);
Route::post('add_student_fee', [studentFeeController::class,'insert']);


///////////////////////////////////////////////////////////////Exam Routing///////////////////////////////////////////////
Route::get('exams', [examController::class,'index']);
Route::post('add_exam', [examController::class,'insert']);
Route::get('add_exam/{id}', [examController::class,'add_exam']);
Route::get('add_exam_marks', [examController::class,'add_exam_marks']);
});