<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookCategory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "quantity",
        "book_category_id",
        "book_cover_image",
        "book_file",
        'user_id'
    ];

    protected $casts = [
        "quantity" => "integer",
        "book_category_id" => "integer"
    ];

    public function category()
    {
        return $this->belongsTo(BookCategory::class, "book_category_id");
    }
}
