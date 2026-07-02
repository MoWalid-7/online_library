<?php

namespace App\Models;

<<<<<<< HEAD
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
=======
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
>>>>>>> origin/online_library
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

<<<<<<< HEAD
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Only admins can access the Filament panel.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Books authored by this user (for authors).
     */
    public function books()
    {
        return $this->hasMany(Book::class, 'author_id');
    }

    /**
     * Books borrowed by this user (for students).
     */
=======
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
>>>>>>> origin/online_library
    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class, 'user_id');
    }
<<<<<<< HEAD

    /**
     * Reviews left by this user.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }
=======
    

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

>>>>>>> origin/online_library
}
