<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Hash;
use Illuminate\Support\Facades\DB;
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
        // TODO: prihlasovanie mi nefunguje pozrite sa na to...
        if(Auth::attempt($credentials))
        {
            // do not sert card_it for admin
            if($credentials['username']=='admin' and $credentials['password']=='admin1'){
                return redirect('admin_pouzivatelia');
            }
            /*
            else {
                // set cart_id for user if only saved his order, also to know that he did it.
                $user_id = DB::table('users')->select('id', 'username')->where('username', $credentials['username'])->first();
                $users_cart_id = -1;
                $users_cart_id = DB::table('shopping_history')->select('id', 'user_id')->where('user_id', $user_id)->first();
                
                session()->put('shopping_cart_id', $users_cart_id->id);
                $latest_cart_id = DB::table('shopping_cart')
                      ->orderByDesc('id')
                      ->value('id');
                if($latest_cart_id == $users_cart_id->id) {
                    session()->put('from_history', TRUE);
                }
                else {
                    session()->put('from_history', FALSE);
                }
                return redirect('/')->with('successLog', 'Prihlásenie uspešné !');
            }
            */
            else {
                return redirect('/')->with('successLog', 'Prihlásenie uspešné !');
            }
        }
        return redirect('login')->with('success', 'Zlé prihlasovacie údaje !');
    }

    function logout(){
        Session::flush();

        Auth::logout();

        return Redirect('login')->with('sucessLogout', 'Úspešne ste sa odhlásili!');
    }
}
