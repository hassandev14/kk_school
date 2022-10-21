<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['student_name','father_name','roll_no','phone','address','image_name','admission_date'];

    
	public function student_classes()
    {
         return $this->hasMany('App\Models\Student_classes','student_id');
    }

    public function get_cl()
    {
		//return $this->hasMany('App\Models\Student_classes','student_id');
       // return $this->belongsToMany('\App\Models\Student_classes')->->with('modelA')('\App\Models\My_classes');
	   return $this->hasManyThrough('App\Models\My_classes', 'App\Models\Student_classes','student_class_id');
    }
}
