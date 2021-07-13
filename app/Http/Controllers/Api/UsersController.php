<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Type;

class UsersController extends Controller
{   
    //This function will get an return all the Users/Restaurants Types in our DB
    public function type()
    {
        $types = Type::all();

        $type_result = [];

        foreach ($types as $type) {
            $type_result[] = [
                'name' => $type->name,
                'id' => $type->id,
                'img_path' => $type->img_path ? $type->img_path : ''
            ];
        }

        return response()->json($type_result);
    }

    //This function will get an return all the Users/Restaurants from a determinated Type
    public function index($id)
    {
        $restaurants = User::where('type_id', '=', $id)->get();

        $restaurants_result = [];

        foreach ($restaurants as $restaurant) {
            $restaurants_result[] = [
                'company_name' => $restaurant->company_name,
                'address' => $restaurant->address,
                'img_path' => $restaurant->img_path ? $restaurant->img_path : ''
            ];
        }

        return response()->json($restaurants_result);
    }
}
