<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class debits extends Model
{
     protected $table = 'debits';
    protected $fillable = ['category_id', 'nominal', 'keterangan', 'tanggal'];

    public function category()
    {
        return $this->belongsTo(CategoriesDebits::class, 'category_id');
    }
}
