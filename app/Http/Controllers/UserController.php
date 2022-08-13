<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    public function get()
    {
        return User::yearbirth()->with(["position", "perfection"])->get();
    }


    public function getFullInPosition()
    {
        return User::withWhereHas('position', function ($query) {
            $query->where('name', 'Full');
        })
            ->yearbirth()
            ->get();
    }

    public function getJuniorInPerfectionAndAges($age1, $age2)
    {
        return User::withWhereHas('perfection', function ($query) use ($age1, $age2) {
            $query->where('name', 'Junior');
        })
            ->where('age', ">", $age1)
            ->where('age', "<", $age2)
            ->yearbirth()
            ->get();
    }

    public function getCityAndPositionAndPerfectionAndAges($age1, $age2)
    {
        return User::
        with(["position", "perfection"])
            ->select(DB::raw('count(*) as count, city,positions_id,perfections_id'))
            ->groupBy('city', "positions_id", "perfections_id")
            ->whereBetween("age", [$age1, $age2])
            ->get();
    }
}
