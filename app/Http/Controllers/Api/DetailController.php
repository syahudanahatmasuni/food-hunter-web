<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\FoodPlace;
use App\Models\Review;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    use ApiResponser;

    public function getDetail(Request $request, $id)
    {
        $item = FoodPlace::find($id);

        $reviews = Review::latest()->where('food_place_id', '=', $id)->skip(0)->take(10)->get();

        return response()->json([
            'status' => 'Success',
            'message' => null,
            'data' => $item,
            'review' => $reviews
        ], 200);
    }

    public function setFavorite(Request $request)
    {
        $userId = $request->user_id;
        $foodPlaceId = $request->food_place_id;

        $favorite = new Favorite();
        $favorite->user_id = $userId;
        $favorite->food_place_id = $foodPlaceId;

        $favorite->save();
        return $this->success($favorite, 'Success set as favorite');
    }

    public function deleteFavorite(Request $request, $id)
    {

        $favorite = Favorite::find($id);

        $isDeleted = Favorite::destroy($id);
        if ($isDeleted < 1) {
            return $this->success(null, 'No Data Deleted');
        }
        return $this->success($favorite, 'Success Delete');
    }

    public function setReview(Request $request)
    {
        $userId = $request->user_id;
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
        return $this->success($reviewModel, 'Success Add Review');
    }
}
