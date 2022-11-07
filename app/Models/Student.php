<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['student_name','father_name','roll_no','phone','address','image_name','admission_date','gender'];

    
	public function student_classes()
    {
         return $this->hasMany('App\Models\Student_classes','student_id');
    }
	public function student_classes_last()
    {
         return $this->hasOne('App\Models\Student_classes','student_id')->latest();
    }

    public function get_cl()
    {
		//return $this->hasManyThrough('App\Models\My_classes', 'App\Models\Student_classes');
		  return $this->hasManyThrough('App\Models\My_classes', 'App\Models\Student_classes', 'student_class_id', null, 'id');
    }
    public function students()
    {
       return $this->hasMany('App\Models\Student_fee');
    }
}
