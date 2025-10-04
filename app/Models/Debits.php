<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debits extends Model
{
    /**
     * @var string
     */
    protected $table = 'debit';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'nominal',
        'description',
        'debit_date'
    ];

    public function category()
    {
        return $this->belongsTo(CategoriesDebits::class, 'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
