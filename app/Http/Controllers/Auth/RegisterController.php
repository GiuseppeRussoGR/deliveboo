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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
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
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //Se l'img_path esiste, allora con la funzione storage creo il path all'immagine
        if(isset($data['img_path'])){
            $img_path = Storage::put('users-cover', $data['img_path']);

            //Se la variabile $img_path viene creata la imposto come valore di $form_data['img_path']
            if ($img_path) {
                $data['img_path'] = $img_path;
            }
        } else {
            $data['img_path'] = '';
        }

        $data['type_id'] = intVal($data['type_id']);

        // dd($data);



        return User::create([
            'company_name' => $data['company_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'city' => $data['city'],
            'p_iva' => $data['p_iva'],
            'img_path' => $data['img_path'],
            'type_id' => $data['type_id']
        ]);
    }

    public function showRegistrationForm(){
        $types = Type::all();
        return view('auth.register', compact('types'));
    }
}
