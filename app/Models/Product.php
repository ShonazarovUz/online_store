<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = [
        'name', 'description', 'price', 'stock', 'category_id', 'vendor_id',
    ];

    // Relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship with the User model (vendor)
    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    // Relationship with the Comment model
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relationship with the Image model
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
