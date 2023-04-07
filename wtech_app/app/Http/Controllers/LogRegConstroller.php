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

        return redirect('/')->with('success', 'Registrácia úspešná');
    }

    function login(){
        
    }
}
