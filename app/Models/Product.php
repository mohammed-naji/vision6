<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // protected $table = 'my_products';

    // protected $fillable = ['name', 'image', 'description', 'price', 'discount', 'category_id'];
    protected $guarded = [];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
