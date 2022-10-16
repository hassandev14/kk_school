<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_classes extends Model
{
    use HasFactory;
    public function student()
    {
       return $this->belongsTo('App\Models\Student');
    }
    public function my_classes()
    {
       return $this->belongsTo('App\Models\My_classes');
    }
}
