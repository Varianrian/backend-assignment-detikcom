<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookCategory;
use Database\Factories\BookCategoryFactory;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with("category")->get();
        $categories = BookCategory::all();
        return view("pages.books.list")->with([
            "books" => $books,
            "categories" => $categories
        ]);
    }

    public function create()
    {
        $categories = BookCategory::all();

        return view("pages.books.create")->with(["categories" => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "required|string",
            "quantity" => "required|integer|min:0",
            "book_category_id" => "required|integer|exists:book_categories,id",
            "book_cover_image" => "required|image",
            "book_file" => "required|file"
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->quantity = $request->quantity;
        $book->book_category_id = $request->book_category_id;
        $book->book_cover_image = $request->file("book_cover_image")->store("book-covers");
        $book->book_file = $request->file("book_file")->store("books");
        $book->save();

        return redirect()->route("books.index")->with([
            "status" => "success",
            "message" => "Book has been created successfully."
        ]);
    }

    public function edit(Book $id)
    {
        $book = $id;
        $categories = BookCategory::all();

        return view("pages.books.edit", compact("book", "categories"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "required|string",
            "quantity" => "required|integer|min:0",
            "book_category_id" => "required|integer|exists:book_categories,id",
            "book_cover_image" => "image",
            "book_file" => "file"
        ]);

        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->quantity = $request->quantity;
        $book->book_category_id = $request->book_category_id;
        if ($request->has("book_cover_image")) {
            $book->book_cover_image = $request->file("book_cover_image")->store("book-covers");
        }
        if ($request->has("book_file")) {
            $book->book_file = $request->file("book_file")->store("books");
        }
        $book->save();

        return redirect()->route("books.index")->with([
            "status" => "success",
            "message" => "Book has been updated successfully."
        ]);
    }

    public function delete(Book $id)
    {
        $book = $id;
        $book->delete();

        return redirect()->route("books.index")->with([
            "status" => "success",
            "message" => "Book has been deleted successfully."
        ]);
    }
}
