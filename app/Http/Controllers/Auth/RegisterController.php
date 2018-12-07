<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'age' => 'integer|min:18',
            'password' => 'required|string|confirmed',
        ],
            $messages = [
                'age.min' => 'Please note that the minimum registration age for Medicare is 18',
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
        if(isset($data['age'])){
            $age = $data['age'];
        }else{
            $age = null;
        }
        if(isset($data['gender'])){
            $gender = $data['gender'];
        }else{
            $gender = null;
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'age' => $age,
            'gender' => $gender,
            'user_type' => $data['user_type'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
