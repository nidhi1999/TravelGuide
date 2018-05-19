<?php

namespace App\Http\Controllers\Auth;
use App\Logincredentials;
use App\User;
use App\Guide;
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
            'email' => 'required|string|email|max:255|unique:Logincredentials',
            'password' => 'required|string|min:6|confirmed',
            'experince' =>'required|integer',
            'about' =>'required|string',
            'costD'=>'required|integer',
            'costH'=>'required|integer',
            'costS'=>'required|integer',
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
        return Logincredentials::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        

    }
    protected function createGuide(array $data)
    {
        return Logincredentials::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'psition' =>'Guide',
        ]);
        return Guide::create([

            'contactno' => $data['contact'],
            'experience' => $data['experience'],
            'about' => $data['about'],
            'cost_per_day' => $data['costD'],
            'cost_per_hour' => $data['costH'],
            'cost_per_service' => $data['costS'],
        ]);
    }

   
}
