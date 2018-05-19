<?php

namespace App\Http\Controllers;
use Auth;

use App\admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/home';


    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    public function getAdminLogin()
    {
        
        if (auth()->guard('admin')->user())
         return redirect()->route('admin.dashboard');
        return view('admin.login');
    }
    public function adminAuth(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        $username=$request['username'];
        $password=$request['password'];
        $admin=admin::all();
    

        if ($admin = admin::where('username', request()->username)->where('password', request()->password)->first()) {
            auth()->guard('admin')->login($admin);
            return redirect()->route('admin.dashboard');
        }else{

            
            
            dd('your username and password are wrong.');
        }
    }
}

