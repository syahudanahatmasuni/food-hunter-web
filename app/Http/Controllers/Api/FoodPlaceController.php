<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\FoodPlace;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodPlaceController extends Controller
{

    use ApiResponser;

    public function getFoodPlaces(Request $request)
    {
        $query = $request->q;
        $categoryId = $request->category_id;
        $page = $request->page;
        $items = FoodPlace::with(['category']);
        if (!empty($query)) {
            $items->where('title', 'LIKE', "%" . $query . "%");
        }

        if (!empty($categoryId)) {
            $items->where('category_id', '=', $categoryId);
        }

        if (empty($page)) {
            return $this->error("Page must be specified", 422);
        }

        $items = $items->paginate(8, ['*'], 'page', $page);
        return $this->datasSuccess($items, 200);
    }

    public function getRecommendedFoodPlaces(Request $request)
    {
        // Recommended Food Places based on places with most favorite
        // Get favorite with group by user_id
        $fav = DB::table('favorites')->groupBy('food_place_id')->orderByRaw('COUNT(*) DESC')->pluck('food_place_id')->toArray();
        $foodPlaces = FoodPlace::with(['category']);
        if (!empty($fav)) {

            // If favorite is not empty
            // Get food places with user id based on favorite
            $foodPlaces = $foodPlaces->whereIn('id', $fav);
        } else {
            $foodPlaces = $foodPlaces->latest();
        }
        // Limit into 8 datas
        $foodPlaces = $foodPlaces->skip(0)->take(8)->paginate(8, ['*'], 'page', 1);

        return $this->datasSuccess($foodPlaces);
        return response()->json($foodPlaces);
    }

    public function getFavorite(Request $request)
    {
        $userId = auth()->id();
        $query = $request->q;
        $categoryId = $request->category_id;
        $page = $request->page;

        $favs = Favorite::where('user_id', '=', $userId)->pluck('food_place_id')->toArray();

        $items = FoodPlace::with(['category'])->whereIn('id', $favs);

        if (!empty($query)) {
            $items->where('title', 'LIKE', "%" . $query . "%");
        }
        if (!empty($categoryId)) {
            $items->where('category_id', '=', $categoryId);
        }
        if (empty($page)) {
            return $this->error("Page must be specified", 422);
        }
        $items = $items->paginate(8, ['*'], 'page', $page);
        return $this->datasSuccess($items, 200);
    }

    public function getCategory(Request $request)
    {
        $items = DB::table('categories')->paginate(25, ['*'], 'page', 1);
        return $this->datasSuccess($items, 200);
    }
}
