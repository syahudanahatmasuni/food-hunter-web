<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id', 'food_place_id', 'rate'
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function food_place()
    {
        return $this->belongsTo(FoodPlace::class, 'food_place_id', 'id');
    }
}
