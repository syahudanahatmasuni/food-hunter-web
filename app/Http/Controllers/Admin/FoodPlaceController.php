<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\FoodPlaceRequest;
use App\Models\FoodPlace;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class FoodPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = FoodPlace::with(['category'])->get();

        return view('pages.admin.tempatmakan.index', [
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
        $categories = Category::all();

        return view('pages.admin.tempatmakan.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodPlaceRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['cover'] = $request->file('cover')->store(
            '/assets/cover',
            'public'
        );

        // $fileName = 'image_' . date('YmdHis') . '_' . str_replace(" ", "-", strtolower($input['prefix'])) .
        //     $path = "/assets/cover/$fileName";

        // Storage::disk('public')->put($path, file_get_contents($cover));

        FoodPlace::create($data);
        return redirect()->route('tempatmakan.index');
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
        $item = FoodPlace::findOrFail($id);
        $categories = Category::all();

        return view('pages.admin.tempatmakan.edit', [
            'item' => $item,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FoodPlaceRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['cover'] = $request->file('cover')->store(
            'assets/cover',
            'public'
        );

        $item = FoodPlace::findOrFail($id);

        $item->update($data);

        return redirect()->route('tempatmakan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = FoodPlace::findOrFail($id);

        $image_path = public_path() . '/' . $item->cover;
        unlink($image_path);
        $item->delete();

        return redirect()->route('tempatmakan.index');
    }
}
