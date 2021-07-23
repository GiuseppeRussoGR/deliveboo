<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

//Specifichiamo l'uso della funzione Storage per inserire file nel DB
use Illuminate\Support\Facades\Storage;
use App\Type;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    //This function will validate the registering user's data
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'company_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'p_iva' => ['required', 'string', 'min:11'],
            'img_path' => ['nullable', 'mimes:jpg,jpeg,png,bmp,gif,svg,webp'],
            'type_id' => ['required', 'exists:types,id'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     */

    //This function will create the new User using the given data in the register page form
    protected function create(array $data)
    {
        //If $data['img_path'] exists, we create the path with the Storage function
        if (isset($data['img_path'])) {
            $img_path = Storage::put('users-cover', $data['img_path']);

            //If $img_path gets created we set it as value of $data['img_path']
            if ($img_path) {
                $data['img_path'] = $img_path;
            }
        } else {
            $data['img_path'] = '';
        }
        $user = new User();
        $user->company_name = $data['company_name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->address = $data['address'];
        $user->city = $data['city'];
        $user->p_iva = $data['p_iva'];
        $user->img_path = $data['img_path'];
        $user->save();
        $user->types()->sync($data['type_id']);
        return $user;
    }

    //With this function we return all the types to the auth.register view
    public function showRegistrationForm()
    {
        $types = Type::all();
        return view('auth.register', compact('types'));
    }
}
