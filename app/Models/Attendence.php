<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    protected $fillable = ['today_attendence','today_date','class_id']; 
    protected $table = 'attendence';

    public function classess()
    {
       return $this->belongsTo('App\Models\My_classes');
    }
}
