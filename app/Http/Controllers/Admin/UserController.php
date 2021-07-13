<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Dish;
use App\Category;
use Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //This function will return all the information and the dishes of the logged user
    public function index()
    {
        $user = Auth::user();
        $id = $user->id;
        $dishes = Dish::where('user_id', '=', $id)->get();
        return view('admin.home', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate($this->getValidationRules());

        $form_data = $request->all();

        $form_data['price'] = floatval($form_data['price']);

        $new_dish = new Dish();

        //If $data['img_path'] exists, we create the path with the Storage function
        if(isset($form_data['img_path'])){
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

        //Reindirizziamo l'utente al nuovo fumetto appena inserito nel DB
        return redirect()->route('admin.user.index');

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
        $dish = Dish::findOrFail($id);
        $categories = Category::all();

        return view('admin.edit', compact('dish', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dish_to_modify = Dish::findOrFail($id);

        $request->validate($this->getValidationRules());

        $form_data = $request->all();

        $form_data['price'] = floatval($form_data['price']);

        //If $data['img_path'] exists, we create the path with the Storage function
        if(isset($form_data['img_path'])){
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

        //Reindirizziamo l'utente al nuovo fumetto appena inserito nel DB
        // TODO
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function getValidationRules(){
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
