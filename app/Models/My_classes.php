<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class My_classes extends Model
{
    use HasFactory;
    protected $fillable = ['class_name'];
    protected $table = 'my_classes';

    public function subject()
    {
         return $this->hasMany('App\Models\Subject');
    }
    public function student_classes()
    {
         return $this->hasMany('App\Models\Student_classes'.'student_id');
    }
    public function attendence()
    {
        return $this->hasMany('App\Models\Attendence');
    }
}
