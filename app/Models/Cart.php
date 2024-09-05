<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'book_id',
        'quantity',
        // 'description',
        // 'price',
        // 'price_sale',
        // 'author_id',
        // 'publisher_id',
        // 'category_id',
        // 'stock',
    ];

    public function book()
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }
}
