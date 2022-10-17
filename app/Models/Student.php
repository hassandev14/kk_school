<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['student_name','father_name','roll_no','phone','address','image_name'];

    public function student_classes()
    {
         return $this->hasMany('App\Models\Student_classes');
    }
    public function get_class()
    {
         return $this->hasMany('App\Models\My_classes');
    }
}
