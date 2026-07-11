<?php

// app/Http/Controllers/StudentController.php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        return view('student.dashboard');
    }

    public function book(Request $request)
    {
        $query = clone Book::query();
        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('author', 'like', "%{$search}%");
        }
        $books = $query->latest()->get();
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
        Auth::user()->update($request->only('name', 'email'));
        return redirect()->route('student.profile');
    }

    public function showBook(int $id)
    {
        $book = Book::with('reviews.user')->findOrFail($id);
        return view('student.books.show', compact('book'));
    }

    public function downloadBook(int $id)
    {
        $book = Book::findOrFail($id);

        if ($book->available_copies <= 0) {
            return back()->with('error', 'لا توجد نسخ متاحة من هذا الكتاب حالياً!');
        }

        if ($book->file_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($book->file_path)) {
            $book->decrement('available_copies');
            return response()->download(\Illuminate\Support\Facades\Storage::disk('public')->path($book->file_path), $book->title . '.pdf');
        }

        return back()->with('error', 'ملف الكتاب غير موجود!');
    }

    public function readBook(int $id)
    {
        $book = Book::findOrFail($id);

        if (!$book->file_path || !\Illuminate\Support\Facades\Storage::disk('public')->exists($book->file_path)) {
            return back()->with('error', 'ملف الكتاب غير موجود للقراءة!');
        }

        return view('student.books.read', compact('book'));
    }

    public function storeReview(Request $request, int $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'rating'  => 'nullable|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        if (empty($validated['rating']) && empty($validated['comment'])) {
            return back()->with('error', 'يجب إدخال تقييم أو تعليق واحد على الأقل.');
        }

        // إذا أدخل تقييماً جديداً، نقوم بحذف أي تقييم سابق له على نفس الكتاب
        // حتى لا يتم حسابه أكثر من مرة في المتوسط
        if (!empty($validated['rating'])) {
            $book->reviews()->where('user_id', Auth::id())->update(['rating' => null]);
        }

        $book->reviews()->create([
            'user_id' => Auth::id(),
            'rating'  => $validated['rating'] ?? null,
            'comment' => $validated['comment'] ?? null,
        ]);

        return back()->with('success', 'تم إضافة تعليقك/تقييمك بنجاح!');
    }
}
