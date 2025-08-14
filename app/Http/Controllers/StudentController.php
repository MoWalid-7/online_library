<?php

// app/Http/Controllers/StudentController.php
namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\Models\Book;

class StudentController extends Controller
{
    public function dashboard()
    {
        return view('student.dashboard');
    }

    public function books()
    {
        $books = Book::all(); // جلب كل الكتب من قاعدة البيانات
        return view('student.books', compact('books'));
    }

    public function editProfile()
    {
        return view('student.profile');
    }

    public function updateProfile(Request $request)
    {
        auth()->user()->update($request->only('name', 'email'));
        return redirect()->route('student.profile');
    }
}

