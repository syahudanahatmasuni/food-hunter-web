<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ReviewRequest;
use App\Models\Review;
use App\Models\User;
use App\Models\FoodPlace;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Review::with(['user', 'food_place'])->get();

        return view('pages.admin.review.index', [
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $food_places = FoodPlace::all();
        $users = User::all();

        return view('pages.admin.review.create', [
            'users' => $users,
            'food_places' => $food_places
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request)
    {
        $data = $request->all();

        Review::create($data);
        return redirect()->route('review.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Review::findOrFail($id);
        $food_places = FoodPlace::all();
        $users = User::all();

        return view('pages.admin.review.edit', [
            'item' => $item,
            'food_places' => $food_places,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewRequest $request, $id)
    {
        $data = $request->all();

        $item = Review::findOrFail($id);

        $item->update($data);

        return redirect()->route('review.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Review::findOrFail($id);

        $item->delete();

        return redirect()->route('review.index');
    }
}
