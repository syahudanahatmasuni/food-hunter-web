<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\FoodPlace;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request)
    {
        $id = request('id');
        $userId = auth()->id();
        $item = FoodPlace::find($id);

        $reviews = Review::with(['user'])->where('food_place_id', '=', $id)->get();
        $rate = Rating::where([
            'user_id' => $userId,
            'food_place_id' => $id
        ])->first();
        $favorite = Favorite::where([
            'user_id' => $userId,
            'food_place_id' => $id
        ])->first();

        return view('pages.detail', [
            'active' => 'detail',
            'isAuth' => '',
            'place' => $item,
            'reviews' => $reviews,
            'favorite' => $favorite,
            'rate' => $rate,
        ]);
    }

    public function setFavorite(Request $request)
    {
        $userId = auth()->id();
        $foodPlaceId = $request->food_place_id;

        $favorite = new Favorite();
        $favorite->user_id = $userId;
        $favorite->food_place_id = $foodPlaceId;

        $favorite->save();
        return response()->json([
            'favorite' => $favorite
        ]);
    }

    public function deleteFavorite(Request $request, $id)
    {

        $favorite = Favorite::find($id);

        $isDeleted = Favorite::destroy($id);
        if ($isDeleted < 1) {
            return $this->success(null, 'No Data Deleted');
        }
        return response()->json([
            'favorite' => $favorite
        ]);
    }

    public function setReview(Request $request)
    {
        $userId = auth()->id();
        $foodPlaceId = $request->food_place_id;
        $review = $request->review;

        $reviewModel = new Review();
        $reviewModel->user_id = $userId;
        $reviewModel->food_place_id = $foodPlaceId;
        $reviewModel->review = $review;

        if (empty($review)) {
            return $this->error('Review Cannot Empty', 422);
        }

        $reviewModel->save();
        return response()->json([
            'review' => $reviewModel,
            'user' => auth()->user()->name,
        ]);
    }

    public function setRating(Request $request)
    {
        $userId = auth()->id();
        $foodPlaceId = $request->food_place_id;
        $rating = $request->rating;

        $ratingModel = new Rating();
        $ratingModel->user_id = $userId;
        $ratingModel->food_place_id = $foodPlaceId;
        $ratingModel->rate = $rating;

        if (empty($rating)) {
            return $this->error('Review Cannot Empty', 422);
        }

        $ratingModel->save();
        return response()->json([
            'rating' => $ratingModel
        ]);
    }
}
