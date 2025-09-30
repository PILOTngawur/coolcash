<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesDebits extends Model
{
    use HasFactory;
    protected $table = 'categories_debit';
    protected $fillable = ['name'];

    public function debits()
    {
        return $this->hasMany(Debit::class, 'category_id');
    }
}