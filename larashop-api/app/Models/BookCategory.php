<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at']; 
    protected $table = 'book_category';
    protected $fillable = [
        'book_id', 'category_id', 'invoice_number', 'status'
    ];

}
