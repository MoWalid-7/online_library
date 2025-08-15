<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
// User.php




    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'role', // لو عندك عمود role لتحديد admin/student
    ];
    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class, 'user_id');
    }
    

    // Book.php
    public function borrowers() {
        return $this->hasMany(BorrowedBook::class);
    }

    // BorrowedBook.php
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function book() {
        return $this->belongsTo(Book::class);
    }

}
