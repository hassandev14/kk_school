<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['subject_name','my_classes_id'];

    public function my_classes()
    {
       return $this->belongsTo('App\Models\My_classes');
    }
}
