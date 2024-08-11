<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    public function index()
    {
        $categories = BookCategory::all()->sortBy("name");
        return view('pages.book-categories.list')->with('categories', $categories);
    }

    public function create()
    {
        return view('pages.book-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        BookCategory::create([
            'name' => $request->name
        ]);

        return redirect()->route('book-categories.index');
    }

    public function edit(BookCategory $id)
    {
        return view('pages.book-categories.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $bookCategory = BookCategory::findOrFail($id);
        $bookCategory->name = $request->name;
        $bookCategory->save();

        return redirect()->route('book-categories.index');
    }

    public function delete($id)
    {
        $bookCategory = BookCategory::findOrFail($id);
        $bookCategory->delete();

        return redirect()->route('book-categories.index');
    }
}
