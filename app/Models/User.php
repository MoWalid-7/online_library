<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

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
    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class, 'user_id');
    }

    /**
     * Reviews left by this user.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }
}
