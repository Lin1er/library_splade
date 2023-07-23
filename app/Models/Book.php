<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'synopsis',
        'image_url',
        'pdf_url',
        'category_id',
        'publisher',
        'isbn'
    ];

    // Menandakan bahwa kolom category_id akan di-cast menjadi array
    protected $casts = [
        'category_id' => 'array',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function borrows() {
        return $this->hasOne(Borrow::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }
}
