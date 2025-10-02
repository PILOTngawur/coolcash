<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesDebits extends Model
{
    /**
     * @var string
     */
    protected $table = 'categories_debit';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'name'
    ];
}