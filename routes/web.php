<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowedBookController;

// auth routes
require __DIR__.'/auth.php';

// صفحة الترحيب
Route::get('/', function () {
    return view('welcome');
})->name('home');
/*use App\Http\Controllers\AdminController;
Route::get('/admin', [AdminController::class, 'index']);
 */
// بعد تسجيل الدخول التوجيه حسب الدور
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('student.dashboard');
})->middleware('auth')->name('dashboard');

// روتات الأدمن
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Books CRUD
    Route::resource('books', BookController::class);

    // Students CRUD
    Route::get('/search-student', [AdminController::class, 'searchStudent'])->name('admin.searchStudent');
    Route::get('/student/{id}', [AdminController::class, 'viewStudent'])->name('admin.viewStudent');

    Route::get('/profile', [AdminController::class, 'editProfile'])->name('admin.profile');
    Route::post('/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');

    // Borrowed Books CRUD
    Route::get('borrowed_books', [AdminController::class, 'indexBorrowedBooks'])->name('admin.borrowed_books.index');
    Route::get('borrowed_books/create', [AdminController::class, 'createBorrowedBook'])->name('admin.borrowed_books.create');
    Route::post('borrowed_books', [AdminController::class, 'storeBorrowedBook'])->name('admin.borrowed_books.store');
    Route::get('borrowed_books/{id}/edit', [AdminController::class, 'editBorrowedBook'])->name('admin.borrowed_books.edit');
    Route::put('borrowed_books/{id}', [AdminController::class, 'updateBorrowedBook'])->name('admin.borrowed_books.update');
    Route::delete('borrowed_books/{id}', [AdminController::class, 'destroyBorrowedBook'])->name('admin.borrowed_books.destroy');
});

// روتات الطالب
Route::middleware(['auth'])->prefix('student')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/books', [StudentController::class, 'books'])->name('student.books');
    Route::get('/profile', [StudentController::class, 'editProfile'])->name('student.profile');
    Route::post('/profile', [StudentController::class, 'updateProfile'])->name('student.profile.update');
});
