<?php

namespace App\Http\Controllers\Api;

use App\Dish;
use App\Http\Controllers\Controller;
use \Illuminate\Http\JsonResponse;
use App\Type;
use App\User;
use stdClass;

class UsersController extends Controller
{
    /**
     * This function will return all the Users/Restaurants Types in our DB
     * @param Type $types instance of Type
     * @return JsonResponse
     */
    public function type(Type $types): JsonResponse
    {
        $types_all = $types->all();

        $type_result = [];

        foreach ($types_all as $type) {
            if($type->image_path === null){
                $type->image_path = '';
            }
            $type_result[] = [
                'name' => $type->name,
                'id' => $type->id,
                'img_path' => $type->image_path
            ];
        }

        return response()->json($type_result);
    }

    /**
     * This function will return all the Users/Restaurants from a determinated Type
     * @param $id int by restaurant
     * @param User $user instance of User
     * @return JsonResponse
     */
    public function index(int $id, User $user): JsonResponse
    {
        $restaurants = $user->where('type_id', '=', $id)->get();

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

    /**
     * This function will return all the Dishes from a determinated User/Restaurant
     * @param $id int by user/restaurant
     * @param Dish $dish instance of Dish
     * @return JsonResponse
     */
    public function dishes(int $id, Dish $dish): JsonResponse
    {
        $dishes = $dish->where('user_id', '=', $id)->get();

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

    /**
     * Make an array with all data about user from orders table
     * @return
     */
    public function statistics($id)
    {
        $array_statistic = [];
        $user = User::find($id);
        $collection_base = $user->dishes()->join('dish_order', 'id', '=', 'dish_order.dish_id')->join('orders', 'order_id', '=', 'orders.id')->get();
        foreach ($collection_base as $single_order) {
            $order_statistic = new stdClass();
            $order_statistic->dish_id = $single_order->dish_id;
            $order_statistic->order_id = $single_order->order_id;
            $order_statistic->name_dish = $single_order->name;
            $order_statistic->total_price = $single_order->total_price;
            $order_statistic->created_at = date_format(date_create($single_order->created_at), 'Y-m');
            $array_statistic[] = $order_statistic;
        }
        return response()->json($array_statistic);
    }
}
