<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function dashboard()
    {
        $author = auth()->user();
        $totalBooks = $author->books()->count();
        $totalCopies = $author->books()->sum('available_copies');
        $totalBorrowed = \App\Models\BorrowedBook::whereHas('book', function ($query) use ($author) {
            $query->where('author_id', $author->id);
        })->whereNull('return_at')->count();

        return view('author.dashboard', compact('totalBooks', 'totalCopies', 'totalBorrowed'));
    }

    public function myBooks(\Illuminate\Http\Request $request)
    {
        $query = auth()->user()->books();
        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%");
        }
        $books = $query->latest()->get();
        return view('author.books.index', compact('books'));
    }

    public function createBook()
    {
        return view('author.books.create');
    }

    public function storeBook(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string',
            'available_copies' => 'required|integer|min:0',
            'isbn'             => 'nullable|string|max:255',
            'published_at'     => 'nullable|date',
            'cover_image'      => 'nullable|image|max:2048',
            'file_path'        => 'nullable|mimetypes:application/pdf|max:512000', // 500MB
        ]);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('book-covers', 'public');
        }

        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request->file('file_path')->store('book-pdfs', 'public');
        }

        $validated['author_id'] = auth()->id();
        $validated['author']    = auth()->user()->name;

        Book::create($validated);

        return redirect()->route('author.books')->with('success', 'Book added successfully.');
    }

    public function editBook($id)
    {
        $book = auth()->user()->books()->findOrFail($id);
        return view('author.books.edit', compact('book'));
    }

    public function updateBook(Request $request, $id)
    {
        $book = auth()->user()->books()->findOrFail($id);

        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string',
            'available_copies' => 'required|integer|min:0',
            'isbn'             => 'nullable|string|max:255',
            'published_at'     => 'nullable|date',
            'cover_image'      => 'nullable|image|max:2048',
            'file_path'        => 'nullable|mimetypes:application/pdf|max:512000',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('book-covers', 'public');
        }

        if ($request->hasFile('file_path')) {
            if ($book->file_path) {
                Storage::disk('public')->delete($book->file_path);
            }
            $validated['file_path'] = $request->file('file_path')->store('book-pdfs', 'public');
        }

        $book->update($validated);

        return redirect()->route('author.books')->with('success', 'Book updated successfully.');
    }

    public function destroyBook($id)
    {
        $book = auth()->user()->books()->findOrFail($id);

        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }

        if ($book->file_path) {
            Storage::disk('public')->delete($book->file_path);
        }

        $book->delete();

        return redirect()->route('author.books')->with('success', 'Book deleted successfully.');
    }
}
