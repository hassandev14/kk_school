<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['teacher_name','father_name','salary','phone','address','image_name','joining_date','gender']; 
    public function teachers()
    {
       return $this->hasMany('App\Models\Teacher_salary');
    }
   
}
