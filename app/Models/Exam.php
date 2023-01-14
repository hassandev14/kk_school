<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = ['class_id','start_date','end_date','timing'];
    
    public function my_classes()
    {
       return $this->belongsTo('App\Models\My_classes', 'class_id');
    }
}
