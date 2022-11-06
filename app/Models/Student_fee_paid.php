<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_fee extends Model
{
    protected $fillable = ['class_id','month','year','all_class_fee_data','submit_date','fee']; 
    protected $table = 'student_fee';
    use HasFactory;
}
