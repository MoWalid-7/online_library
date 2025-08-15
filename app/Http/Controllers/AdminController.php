<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\BorrowedBook;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Dashboard
    public function dashboard() {
        return view('admin.dashboard');
    }

    // Profile
    public function editProfile() {
        return view('admin.profile');
    }

    public function updateProfile(Request $request) {
        auth()->user()->update($request->only('name','email'));
        return redirect()->route('admin.profile');
    }

    // Books CRUD
    public function indexBooks() {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    public function createBook() {
        return view('admin.books.create');
    }

    public function storeBook(Request $request) {
        Book::create($request->only('title','author'));
        return redirect()->route('admin.books.index');
    }

    public function editBook($id) {
        $book = Book::findOrFail($id);
        return view('admin.books.edit', compact('book'));
    }

    public function updateBook(Request $request, $id) {
        $book = Book::findOrFail($id);
        $book->update($request->only('title','author'));
        return redirect()->route('admin.books.index');
    }

    public function destroyBook($id) {
        Book::destroy($id);
        return redirect()->route('admin.books.index');
    }

    // Students CRUD
    public function indexStudents() {
        $students = User::where('role','student')->get();
        return view('admin.students.index', compact('students'));
    }

    public function createStudent() {
        return view('admin.students.create');
    }

    public function storeStudent(Request $request) {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'student'
        ]);
        return redirect()->route('admin.students.index');
    }

    public function editStudent($id) {
        $student = User::findOrFail($id);
        return view('admin.students.edit', compact('student'));
    }

    public function updateStudent(Request $request, $id) {
        $student = User::findOrFail($id);
        $student->update($request->only('name','email'));
        return redirect()->route('admin.students.index');
    }

    public function destroyStudent($id) {
        User::destroy($id);
        return redirect()->route('admin.students.index');
    }

    // Borrowed Books CRUD
    public function indexBorrowedBooks() {
        $borrowedBooks = BorrowedBook::with(['student','book'])->get();
        return view('admin.borrowed_books.index', compact('borrowedBooks'));
    }

    public function createBorrowedBook() {
        $students = User::where('role','student')->get();
        $books = Book::all();
        return view('admin.borrowed_books.create', compact('students','books'));
    }

    public function storeBorrowedBook(Request $request) {
        BorrowedBook::create($request->only('user_id','book_id'));
        return redirect()->route('admin.borrowed_books.index');
    }

    public function editBorrowedBook($id) {
        $borrowedBook = BorrowedBook::findOrFail($id);
        $students = User::where('role','student')->get();
        $books = Book::all();
        return view('admin.borrowed_books.edit', compact('borrowedBook','students','books'));
    }

    public function updateBorrowedBook(Request $request, $id) {
        $borrowedBook = BorrowedBook::findOrFail($id);
        $borrowedBook->update($request->only('user_id','book_id'));
        return redirect()->route('admin.borrowed_books.index');
    }

    public function destroyBorrowedBook($id) {
        BorrowedBook::destroy($id);
        return redirect()->route('admin.borrowed_books.index');
    }

    // Search Student
    public function searchStudent() {
        return view('admin.search-student');
    }

    public function viewStudent($id) {
        return view('admin.student-details', compact('id'));
    }
}
