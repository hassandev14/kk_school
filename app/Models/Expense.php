<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['expense_name','expense_detail','expense_amount','given_by','employe_id','category_id'];
    protected $table = 'expenses';

    public function category()
    {
       return $this->belongsTo('App\Models\Category');
    }
    public function employe()
    {
       return $this->belongsTo('App\Models\Employe');
    }
}