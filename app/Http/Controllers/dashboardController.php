<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Employe;
use DB;

class dashboardController extends Controller
{
    public function index(Request $request)
    {
            
        $month = date("m");
        $monthName = date("M");
        $year = date("Y");
        $duration='';
        $date_filter ="";
        $operator=" = ";
        $for =  "$month Month and $year Year";
        $student = Student::all()->count();
        $teacher = Teacher::all()->count();
        $employe = Employe::all()->count();
        $dataWhere="";
        if(isset($request->duration))
        {
        
            $duration = $request->duration;
            
            if($duration !='all')
            {
              //dd($request->duration);
              $operator=" >= ";
              $month = date("m",strtotime("-$duration month"));
              $year = date("Y",strtotime("-$duration month"));
              if($duration==0)
              {
                $for =  "$month Month of $year Year";

              }elseif($duration==3)
              {
                $for =  "For Last 3 Months Start from $monthName,$year";

              } else if($duration==6)
              {
                $for =  "For Last 6 Months Start from $monthName,$year";

              }else if($duration==12)
              {
                $for =  "For Last 12 Months Start from $monthName,$year";

              }     
            }else{
             // dd('fdfdf');
              $for =  "Showing All data";
            }
        }
        if(isset($request->date_filter))
        {
          $date_filter = $request->date_filter;
          $month = date("m",strtotime($date_filter));
          $year = date("Y",strtotime($date_filter));
          $for =  "$month Month of $year Year";
        }
        $sql="SELECT 
        JSON_LENGTH(JSON_SEARCH(all_class_fee_data,'all','unpaid')) AS count_unpaid ,
        JSON_LENGTH(JSON_SEARCH(all_class_fee_data,'all','unpaid'))*fee AS total_unpaid,
        JSON_LENGTH(JSON_SEARCH(all_class_fee_data,'all','paid')) AS count_paid ,
        JSON_LENGTH(JSON_SEARCH(all_class_fee_data,'all','paid'))*fee AS total_paid
        FROM student_fee WHERE 1=1 and YEAR(submit_date) = $year  AND MONTH(submit_date) $operator $month";
          $all_fee = DB::select($sql);
          if(empty($all_fee))
          {

           // dd('reached');
            $all_fee[0]=(object) array("count_unpaid"=>0,"total_unpaid"=>0,"count_paid"=>0,"total_paid"=>0);
          }
         
        // dd(DB::getQueryLog());
         
        $sql="SELECT IFNULL(SUM(expense_amount),0)  as exp_amount FROM expenses WHERE MONTH(pay_date) $operator $month AND  YEAR(pay_date) = $year ";
        $all_expenses = DB::select($sql);
       
        if(empty($all_expenses))
        {

          $all_expenses[0]=(object) array("exp_amount"=>0);
        }
         $sql ="SELECT COUNT(ts.id) AS count_paid,IFNULL((COUNT(ts.id) *  ts.salary),0)AS total_paid
        FROM teacher_salary ts
        INNER JOIN teachers t ON t.id=ts.teacher_id
        WHERE MONTH(pay_date) $operator $month AND  YEAR(pay_date) = $year AND `status`='paid'";
        $all_pay_salary = DB::select($sql);
        if(empty($all_pay_salary))
        {

          $all_pay_salary[0]=(object) array("count_paid"=>0,"total_paid"=>0);
        }
         $sql ="SELECT COUNT(ts.id)AS count_unpaid,IFNULL((COUNT(ts.id) *  ts.salary),0) AS total_unpaid
        FROM teacher_salary ts
        INNER JOIN teachers t ON t.id=ts.teacher_id
        WHERE MONTH(pay_date) $operator $month AND  YEAR(pay_date) = $year AND `status`='unpaid'";
        $all_un_pay_salary = DB::select($sql);

        if(empty($all_un_pay_salary))
        {

          $all_un_pay_salary[0]=(object) array("count_paid"=>0,"total_paid"=>0);
        }


        return view('dashboard',array('student'=>$student,'teacher'=>$teacher,
        'employe'=>$employe,'all_expenses'=>$all_expenses[0],'all_fee'=>$all_fee[0],
        'all_pay_salary'=>$all_pay_salary[0],'all_un_pay_salary'=>$all_un_pay_salary[0],'for'=>$for,'duration'=>$duration, 'date_filter' => $date_filter));
    }
}
