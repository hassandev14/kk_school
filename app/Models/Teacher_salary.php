<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher_salary extends Model
{
    protected $fillable = ['teacher_id','salary','apply_date'];
    protected $table = 'teachers_salary';

    public function teachers()
    {
       return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }
}

