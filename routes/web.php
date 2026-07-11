<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowedBookController;
use App\Http\Controllers\AuthorController;

// auth routes
require __DIR__ . '/auth.php';

// صفحة الترحيب
Route::get('/', function (\Illuminate\Http\Request $request) {
    $query = \App\Models\Book::query();
    if ($search = $request->input('search')) {
        $query->where('title', 'like', "%{$search}%")
            ->orWhere('author', 'like', "%{$search}%");
    }
    $books = $query->latest()->get();
    return view('welcome', compact('books'));
})->name('home');

/*use App\Http\Controllers\AdminController;
Route::get('/admin', [AdminController::class, 'index']);
 */
// بعد تسجيل الدخول التوجيه حسب الدور
Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('student.dashboard');
})->middleware('auth')->name('dashboard');

// روتات المؤلف (Author)
Route::middleware(['auth', 'author'])->prefix('author')->group(function () {
    Route::get('/dashboard', [AuthorController::class, 'dashboard'])->name('author.dashboard');
    Route::get('/books', [AuthorController::class, 'myBooks'])->name('author.books');
    Route::get('/books/create', [AuthorController::class, 'createBook'])->name('author.books.create');
    Route::post('/books', [AuthorController::class, 'storeBook'])->name('author.books.store');
    Route::get('/books/{id}/edit', [AuthorController::class, 'editBook'])->name('author.books.edit');
    Route::put('/books/{id}', [AuthorController::class, 'updateBook'])->name('author.books.update');
    Route::delete('/books/{id}', [AuthorController::class, 'destroyBook'])->name('author.books.destroy');
});

// روتات الأدمن القديمة (لو حابب تحتفظ بيها للإدارة المخصصة بعيداً عن Filament)
// Route::middleware(['auth', 'admin'])->prefix('admin-old')->group(function () {});
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
    // Book Features routes
    Route::get('/books/{id}', [StudentController::class, 'showBook'])->name('student.books.show');
    Route::get('/books/{id}/download', [StudentController::class, 'downloadBook'])->name('student.books.download');
    Route::get('/books/{id}/read', [StudentController::class, 'readBook'])->name('student.books.read');
    Route::post('/books/{id}/review', [StudentController::class, 'storeReview'])->name('student.books.review.store');
    Route::get('/profile', [StudentController::class, 'editProfile'])->name('student.profile');
    Route::post('/profile', [StudentController::class, 'updateProfile'])->name('student.profile.update');
});
