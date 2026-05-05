<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'food_place_id', 'url',
    ];

    protected $hidden = [];

    public function food_place()
    {
        return $this->belongsTo(FoodPlace::class, 'food_place_id', 'id');
    }
}
