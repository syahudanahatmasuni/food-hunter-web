<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodPlace extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'category_id', 'title', 'slug', 'latitude', 'longitude', 'about',
        'favorite_menu', 'location', 'open_hours', 'cover', 'rating', 'count_rating'
    ];

    protected $hidden = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'food_places_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'food_places_id', 'id');
    }
}
