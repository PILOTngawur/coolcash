<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    protected $table = 'credit'; // sesuai migration

    protected $fillable = [
        'nominal',
        'description',
        'category_id',
        'credit_date',
        'user_id'
    ];

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(CategoriesCredit::class, 'category_id');
    }

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
