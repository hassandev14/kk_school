<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class My_classes extends Model
{
    use HasFactory;
    protected $fillable = ['class_name'];
    protected $table = 'my_classes';
    protected $primaryKey  = 'id';

    public function subject()
    {
         return $this->hasMany('App\Models\Subject');
    }
    public function student_subject()
    {
         return $this->hasMany('App\Models\Student_classes');
    }
}
