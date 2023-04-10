<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LogRegConstroller extends Controller
{
    function index(){
        return view('login');
    }

    function register(){
        return view('register');
    }
    function login(){
        return view('login');
    }

    function admin_pouzivatelia(){
        return view('admin_pouzivatelia');
    }
    function admin_produkty(){
        return view('admin_produkty');
    }
    
    

    function validate_registration(Request $request)
    {
        $request->validate([
            'name'         =>   'required',
            'username'    =>   'required',
            'email'        =>   'required|email|unique:users',
            'password'     =>   'required|min:6'
        ]);

        $data = $request->all();

        User::create([
            'name'  =>  $data['name'],
            'username'    =>   $data['username'],
            'email' =>  $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect('login')->with('successReg', 'Registrácia úspešná');
    }

    function validate_login(Request $request)
    {
        $request->validate([
            'username' =>  'required',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('username', 'password');

        if(Auth::attempt($credentials))
        {
            if($credentials['username']=='admin' and $credentials['password']=='admin1'){
                return redirect('admin_pouzivatelia');
            }
            else {
                return redirect('/')->with('successLog', 'Prihlásenie uspešné !');;
            }
            
        }
        return redirect('login')->with('success', 'Zlé prihlasovacie údaje !');
    }

    function logout(){
        Session::flush();

        Auth::logout();

        return Redirect('login');
    }
}
