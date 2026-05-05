<?php

namespace App\Http\Controllers;

use App\Models\FoodPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TempatMakanController extends Controller
{
    public function index(Request $request)
    {
        $items = FoodPlace::latest();

        if (request('search')) {
            $items = $items->where('title', 'like', '%' . request('search') . '%');
        }

        $items = $items->paginate(8);
        return view('pages.tempatmakan', [
            'items' => $items,
            'active' => 'foodplaces',
            'isAuth' => ''
        ]);
    }
}
