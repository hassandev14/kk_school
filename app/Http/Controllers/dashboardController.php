<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Employe;
use DB;

class dashboardController extends Controller
{
    public function index()
    {
        $student = Student::all()->count();
        $teacher = Teacher::all()->count();
        $employe = Employe::all()->count();

        $all_expenses = DB::select("SELECT sum(expense_amount) as exp_amount FROM expenses WHERE YEAR(created_at)=2023");
        $all_fee = DB::select("SELECT month, `year`, 
        JSON_LENGTH(JSON_SEARCH(all_class_fee_data,'all','unpaid')) AS count_unpaid ,
        JSON_LENGTH(JSON_SEARCH(all_class_fee_data,'all','unpaid'))*fee AS total_unpaid,
        JSON_LENGTH(JSON_SEARCH(all_class_fee_data,'all','paid')) AS count_paid ,
        JSON_LENGTH(JSON_SEARCH(all_class_fee_data,'all','paid'))*fee AS total_paid
         FROM student_fee WHERE MONTH(submit_date) = MONTH(CURRENT_DATE()) AND  YEAR(submit_date) = YEAR(CURRENT_DATE()) ");

        $all_pay_salary = DB::select("SELECT ts.`month`, ts.`year` ,ts.`status`,COUNT(ts.id)
        AS count_paid,(COUNT(ts.id) *  ts.salary)AS total_paid
        FROM teacher_salary ts
        INNER JOIN teachers t ON t.id=ts.teacher_id
        WHERE MONTH(pay_date) = MONTH(CURRENT_DATE()) AND  YEAR(pay_date) = YEAR(CURRENT_DATE()) AND `status`='paid';");

        $all_un_pay_salary = DB::select("SELECT ts.`month`, ts.`year` ,ts.`status`,COUNT(ts.id)AS count_unpaid,(COUNT(ts.id) *  ts.salary)AS total_unpaid
        FROM teacher_salary ts
        INNER JOIN teachers t ON t.id=ts.teacher_id
        WHERE MONTH(pay_date) = MONTH(CURRENT_DATE()) AND  YEAR(pay_date) = YEAR(CURRENT_DATE()) AND `status`='unpaid';");
      // dd($all_fee);
 
        return view('dashboard',array('student'=>$student,'teacher'=>$teacher,
        'employe'=>$employe,'all_expenses'=>$all_expenses[0],'all_fee'=>$all_fee[0],
        'all_pay_salary'=>$all_pay_salary[0],'all_un_pay_salary'=>$all_un_pay_salary[0]));
    }
}
