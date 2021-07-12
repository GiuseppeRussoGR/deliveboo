<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Type;

class UsersController extends Controller
{
    public function type()
    {
        $types = Type::all();
        $type_result = [];
        foreach ($types as $type) {
            $type_result[] = [
                'name' => $type->name,
                'id' => $type->id
            ];
        }

        return response()->json($type_result);
    }
    public function index($id)
    {
        $restaurants = User::where('type_id', '=', $id)->get();
        $restaurants_result = [];
        foreach ($restaurants as $restaurant) {
            $restaurants_result[] = [
                'company_name' => $restaurant->company_name,
                'address' => $restaurant->address,
                'image' => $restaurant->path_image ? $restaurant->path_image : ''
            ];
        }

        return response()->json($restaurants_result);
    }
}
