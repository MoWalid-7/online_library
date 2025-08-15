<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{
    

    protected $fillable = [
        'user_id',
        'book_id',
        'borrowed_at',
        'return_at'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}

