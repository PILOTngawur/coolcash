<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesCredit extends Model
{
    use HasFactory;

    protected $table = 'categories_credit';

    protected $fillable = [
        'name',
        'user_id', // << tambahin biar bisa mass assignment
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function credits()
    {
        return $this->hasMany(Credit::class, 'category_id');
    }
}
