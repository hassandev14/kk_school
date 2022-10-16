<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    protected $table = 'category';

    public function expenses()
    {
         return $this->hasMany('App\Models\Expense');
    }
}
