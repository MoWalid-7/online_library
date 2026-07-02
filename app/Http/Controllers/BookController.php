<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Book;
=======
>>>>>>> origin/online_library
use Illuminate\Http\Request;

class BookController extends Controller
{
<<<<<<< HEAD
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'            => 'required|string|max:255',
            'author'           => 'required|string|max:255',
            'description'      => 'nullable|string',
            'available_copies' => 'nullable|integer|min:0',
        ]);

        Book::create([
            'title'            => $request->title,
            'author'           => $request->author,
            'description'      => $request->description ?? '',
            'available_copies' => $request->available_copies ?? 0,
        ]);

        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    public function show(Book $book)
    {
        return view('admin.books.index', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title'            => 'required|string|max:255',
            'author'           => 'required|string|max:255',
            'description'      => 'nullable|string',
            'available_copies' => 'nullable|integer|min:0',
        ]);

        $book->update([
            'title'            => $request->title,
            'author'           => $request->author,
            'description'      => $request->description ?? $book->description,
            'available_copies' => $request->available_copies ?? $book->available_copies,
        ]);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
=======
    //
>>>>>>> origin/online_library
}
