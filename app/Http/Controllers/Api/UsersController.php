<?php

namespace App\Http\Controllers\Api;

use App\Dish;
use App\Http\Controllers\Controller;
use App\Type;
use App\User;

class UsersController extends Controller
{
    //This function will return all the Users/Restaurants Types in our DB
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

    //This function will return all the Users/Restaurants from a determinated Type
    public function index($id)
    {
        $restaurants = User::where('type_id', '=', $id)->get();

        $restaurants_result = [];

        foreach ($restaurants as $restaurant) {
            $restaurants_result[] = [
                'id' => $restaurant->id,
                'name' => $restaurant->company_name,
                'address' => $restaurant->address,
                'city' => $restaurant->city,
                'img_path' => $restaurant->img_path ? $restaurant->img_path : ''
            ];
        }

        return response()->json($restaurants_result);
    }

    //This function will return all the Dishes from a determinated User/Restaurant
    public function dishes($id)
    {
        $dishes = Dish::where('user_id', '=', $id)->get();

        $dishes_result = [];

        foreach ($dishes as $dish) {
            $dishes_result[] = [
                'id' => $dish->id,
                'name' => $dish->name,
                'description' => $dish->description,
                'price' => $dish->price,
                'img_path' => $dish->img_path ? $dish->img_path : ''
            ];
        }

        return response()->json($dishes_result);
    }
}
