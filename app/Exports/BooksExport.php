<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BooksExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        if (auth()->user()->role == "admin") {
            return Book::with("category")->get();
        } else {
            return Book::with("category")->where('user_id', auth()->user()->id)->get();
        }
    }

    public function headings(): array
    {
        return [
            ['title', 'description', 'quantity', 'category', 'book_cover_url', 'book_file_url'],
        ];
    }

    public function map($book): array
    {
        return [
            $book->title,
            $book->description,
            $book->quantity,
            $book->category->name,
            app('url')->to('/') . '/storage/' . $book->book_cover_image,
            app('url')->to('/') . '/storage/' . $book->book_file,
        ];
    }
}
