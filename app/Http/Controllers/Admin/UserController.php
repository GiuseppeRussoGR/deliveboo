<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Dish;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use stdClass;
use function Composer\Autoload\includeFile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */

    //This function will return all the information and the dishes of the logged user
    public function index(): View
    {
        $user = Auth::user();
        $id = $user->id;
        $dishes = Dish::where('user_id', '=', $id)->get();
        return view('admin.home', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  View
     */
    public function create(): View
    {
        $categories = Category::all();
        $user = Auth::user();
        $array_type = [];
        foreach ($user->types as $type) {
            $types = new stdClass();
            $types->id = $type->id;
            $types->name = $type->name;
            $array_type[] = $types;
        }
        return view('admin.create', compact('categories', 'array_type'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return  RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $request->validate($this->getValidationRules());
        $form_data = $request->all();
        $form_data['price'] = floatval($form_data['price']);
        $new_dish = new Dish();

        //If $data['img_path'] exists, we create the path with the Storage function
        if (isset($form_data['img_path'])) {
            $img_path = Storage::put('dishes-cover', $form_data['img_path']);

            //If $img_path gets created we set it as value of $form_data['img_path']
            if ($img_path) {
                $form_data['img_path'] = $img_path;
            }
        } else {
            $form_data['img_path'] = '';
        }

        $form_data['user_id'] = $user->id;
        $new_dish->fill($form_data);
        $new_dish->save();

        //Reindirizziamo l'utente al nuovo piatto appena inserito nel DB
        return redirect()->route('admin.user.index');

    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $dish = Dish::findOrFail($id);

        return view('admin.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $dish = Dish::findOrFail($id);
        $categories = Category::all();
        $user = Auth::user();
        $array_type = [];
        foreach ($user->types as $type) {
            $types = new stdClass();
            $types->id = $type->id;
            $types->name = $type->name;
            $array_type[] = $types;
        }

        return view('admin.edit', compact('dish', 'categories', 'array_type'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $dish_to_modify = Dish::findOrFail($id);
        $request->validate($this->getValidationRules());
        $form_data = $request->all();
        $form_data['price'] = floatval($form_data['price']);

        //If $data['img_path'] exists, we create the path with the Storage function
        if (isset($form_data['img_path'])) {
            $img_path = Storage::put('dishes-cover', $form_data['img_path']);

            //If $img_path gets created we set it as value of $form_data['img_path']
            if ($img_path) {
                $form_data['img_path'] = $img_path;
            }
        } else {
            $form_data['img_path'] = $dish_to_modify->img_path;
        }
        $form_data['user_id'] = $dish_to_modify->user_id;
        $dish_to_modify->update($form_data);
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $dish_to_delete = Dish::findOrFail($id);
        $dish_to_delete->orders()->sync([]);
        $dish_to_delete->delete();

        return redirect()->route('admin.user.index');
    }

    /**
     * Make an array with all data about user from orders table
     * @return View
     */
    public function listOrder(): View
    {
        $array_list = [];
        $user = Auth::user();
        $order_collection = $user->dishes()->join('dish_order', 'id', '=', 'dish_order.dish_id')->join('orders', 'order_id', '=', 'orders.id')->get();
        foreach ($order_collection as $single_order) {
            $order = new stdClass();
            $order->name = $single_order->name;
            $order->quantity = $single_order->quantity;
            $order->order_id = $single_order->order_id;
            $order->name_dish = $single_order->name;
            $order->quantita_dish = $single_order->quantita;
            $order->total_price = $single_order->total_price;
            $order->created_at = date_format(date_create($single_order->created_at), 'Y-m-d');
            $array_list[$order->order_id] = $order;
        }
        return view('admin.list_order', compact('array_list'));
    }

    public function statistic()
    {
        $id = Auth::user()->id;
        return view('admin.statistic', compact('id'));
    }

    /**
     * Validate element from user request
     * @return string[][]
     */
    private function getValidationRules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'description' => ['string', 'max:255'],
            'price' => ['required', 'between: 0.99,999'],
            'visibility' => ['required', 'boolean'],
            'img_path' => ['nullable', 'mimes:jpg,jpeg,png,bmp,gif,svg,webp'],
            'category_id' => ['required', 'exists:categories,id']
        ];
    }
}
