<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher_salary_paid extends Model
{
    protected $fillable = ['teacher_id','month','year','pay_date','status','image_name','method']; 
    protected $table = 'teacher_salary_paid';
    use HasFactory;
}
