<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\FoodPlace;
use Illuminate\Http\Request;

class FavoriteController extends Controller{
    public function index(Request $request){

        $userId = auth()->id();

        $favs = Favorite::where('user_id', '=', $userId)->pluck('food_place_id')->toArray();

        $items = FoodPlace::whereIn('id', $favs);

        if (request('search')) {
            $items->where('title', 'LIKE', "%" . request('search') . "%");
        }

        $items = $items->paginate(8);
        return view('pages.favorite', [
            'active' => 'favorite',
            'items' => $items,
            'isAuth' => ''
        ]);
    }
}
