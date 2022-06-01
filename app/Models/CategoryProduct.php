<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
