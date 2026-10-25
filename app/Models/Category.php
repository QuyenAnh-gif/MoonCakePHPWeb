<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // Khai báo 1 Category có nhiều Products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}