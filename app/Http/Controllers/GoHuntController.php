<?php

namespace App\Http\Controllers;

use App\Models\FoodPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoHuntController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.gohunt', [
            'active' => 'gohunt',
            'isAuth' => ''
        ]);
    }

    public function getHunt(Request $request)
    {
        $lat = $request->lat;
        $lon = $request->lon;

        $datas = FoodPlace::havingRaw(
            "(((ACOS(SIN((" . $lat . "*PI()/180)) * SIN((latitude*pi()/180))+COS((" . $lat . "*PI()/180)) * COS((latitude*PI()/180)) * COS(((" . $lon . "-longitude)*PI()/180))))*180/PI())*60*1.1515*1.609344) <= ?",
            [6]
        )->get();

        return response()->json([
            'data' => $datas
        ]);
    }
}
