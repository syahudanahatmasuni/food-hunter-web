<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\FavoriteRequest;
use App\Models\Favorite;
use App\Models\User;
use App\Models\FoodPlace;

class FavoriteAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Favorite::with(['user', 'food_place'])->get();

        return view('pages.admin.favorite.index', [
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

        return view('pages.admin.favorite.create', [
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
    public function store(FavoriteRequest $request)
    {
        $data = $request->all();

        Favorite::create($data);
        return redirect()->route('favorite.index');
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
        $item = Favorite::findOrFail($id);
        $food_places = FoodPlace::all();
        $users = User::all();

        return view('pages.admin.favorite.edit', [
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
    public function update(FavoriteRequest $request, $id)
    {
        $data = $request->all();

        $item = Favorite::findOrFail($id);

        $item->update($data);

        return redirect()->route('favorite.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Favorite::findOrFail($id);

        $item->delete();

        return redirect()->route('favorite.index');
    }
}
