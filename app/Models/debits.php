<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class debits extends Model
{
    use HasFactory;
    protected $table = 'debit';
    protected $fillable = ['user_id', '', 'category_id',
 'nominal' , 'description' , 'debit_date'];
}
