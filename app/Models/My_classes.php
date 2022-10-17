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
         return $this->hasMany('App\Models\Student_classes');
    }
	
	/*public function std()
    {
        return $this->belongsToMany('App\Models\Student')->using('App\Models\Student_classes');
    }*/
}
