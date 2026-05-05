<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FoodPlace;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class GoHuntController extends Controller
{
    use ApiResponser;

    public function getHunt(Request $request)
    {
        $lat = $request->get('lat');
        $lon = $request->get('lon');

        if ($lat == 0 || $lon == 0) {
            return $this->error("Coordinates must be filled", 422);
        }

        $datas = FoodPlace::with(["category"])->havingRaw(
            "(((ACOS(SIN((" . $lat . "*PI()/180)) * SIN((latitude*pi()/180))+COS((" . $lat . "*PI()/180)) * COS((latitude*PI()/180)) * COS(((" . $lon . "-longitude)*PI()/180))))*180/PI())*60*1.1515*1.609344) <= ?",
            [1]
        )->paginate(5, ['*'], 'page', 1);

        return $this->datasSuccess($datas, 200);
    }
}
