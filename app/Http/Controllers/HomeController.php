<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Favorite;
use App\Models\FoodPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Get 4 categories
        $categories = DB::table('categories')->skip(0)->take(4)->get()->all();
        $categoriesCount = array();
        foreach ($categories as $category) {
            // Push to array include count of the places with specific category
            // and name of the category
            array_push(
                $categoriesCount,
                array(
                    'count' => count(DB::table('food_places')->where('category_id', '=',  $category->id)->get()),
                    'name' => $category->name,
                )
            );
        }

        // Recommended Food Places based on places with most favorite
        // Get favorite with group by user_id
        $fav = DB::table('favorites')->groupBy('food_place_id')->orderByRaw('COUNT(*) DESC')->pluck('food_place_id')->toArray();
        $foodPlaces = DB::table('food_places');
        if (!empty($fav)) {

            // If favorite is not empty
            // Get food places with user id based on favorite
            $foodPlaces = $foodPlaces->whereIn('id', $fav);
        }
        // Limit into 8 datas
        $foodPlaces = $foodPlaces->skip(0)->take(8)->get();

        return view('pages.home', [
            'places' => $foodPlaces,
            'categories' => $categoriesCount,
            'active' => 'home',
            'isAuth' => ''
        ]);
    }
}
