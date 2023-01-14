<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_fee extends Model
{
    protected $fillable = ['student_id','fee','apply_date'];
    protected $table = 'student_fee';

    public function students()
    {
       return $this->belongsTo('App\Models\Student', 'student_id');
    }
}

