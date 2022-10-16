<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $fillable = ['employe_name','father_name','salary','phone','address','image_name']; 
   
    public function expenses()
    {
         return $this->hasMany('App\Models\Expense');
    }
}
