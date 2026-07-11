<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'description',
        'available_copies',
        'author_id',
        'cover_image',
        'file_path',
        'isbn',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'date',
        ];
    }

    /**
     * The user (author) who created this book.
     */
    public function authorUser()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Borrowed book records for this book.
     */
    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class, 'book_id');
    }

    /**
     * Reviews for this book.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'book_id');
    }

    /**
     * Get the average rating of the book.
     */
    public function averageRating()
    {
        return $this->reviews()->avg('rating') ?: 0;
    }
}
