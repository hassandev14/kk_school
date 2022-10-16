<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    use HasFactory;
    protected $fillable = ['class_name'];
    protected $table = 'class';

    public function Subject()
    {
         return $this->hasMany('App\Models\Sybject');
    }
}
