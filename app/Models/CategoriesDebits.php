<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesDebits extends Model
{
    use HasFactory;
    protected $table = 'categories_debit';
    protected $fillable = [
        'user_id', 'name'
    ];
}