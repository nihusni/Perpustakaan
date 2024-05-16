<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function book()
    {

        return $this->belongsTo(Book::class);

    }


    public function user()
    {

        return $this->belongsTo(User::class);

    }


    public function bookshelve()
    {

        return $this->belongsTo(Bookshelve::class);

    }

    public function category()
    {

        return $this->belongsTo(Category::class);

    }
    
}
