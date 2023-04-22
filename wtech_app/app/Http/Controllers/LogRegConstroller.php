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

        // create new shopping cart for user if not exists
        /*
        $users_id = DB::table('users')->select('username')->where('username', $credentials['username'])->get();
        $users_cart_id = -1;
        $users_cart_id = DB::table('shopping_cart')->select('id')->where('user_id', $users_id)->get();
        // new user, sotre on a session as currently active shopping_cart_id or module ?
        if($users_cart_id == -1) {
            // create a new one
            DB::table('shopping_cart')->insert([
                'user_id' => $users_id,
                'date' => now(),
            ]);
            $latest_cart_id = DB::table('shopping_cart')
                                ->orderByDesc('id')
                                ->value('id');
            session()->put('shopping_cart_id', $latest_cart_id);
        }
        else {
            session()->put('shopping_cart_id', $users_cart_id);
        }
        */
        // TODO: create a default shopping_cart on first attempt to laod main page if not exists with id = 1

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
                // create new shopping cart for user if not exists
                /*
                $users_id = DB::table('users')->select('username')->where('username', $credentials['username'])->get();
                $users_cart_id = -1;
                $users_cart_id = DB::table('shopping_cart')->select('id')->where('user_id', $users_id)->get();
                // new user, sotre on a session as currently active shopping_cart_id or module ?
                if($users_cart_id == -1) {
                    // create a new one
                    DB::table('shopping_cart')->insert([
                        'user_id' => $users_id,
                        'date' => now(),
                    ]);
                    $latest_cart_id = DB::table('shopping_cart')
                                        ->orderByDesc('id')
                                        ->value('id');
                    session()->put('shopping_cart_id', $latest_cart_id);
                }
                else {
                    session()->put('shopping_cart_id', $users_cart_id);
                }
                */
                // TODO: create a default shopping_cart on first attempt to laod main page if not exists with id = 1

                return redirect('/')->with('successLog', 'Prihlásenie uspešné !');;
            }

        }
        return redirect('login')->with('success', 'Zlé prihlasovacie údaje !');
    }

    // it is controproductive to create whole new controler for main page with just one function ...
    function setDefaultShoppingCart(){
        // is there any cart ?
        $count = DB::table('shopping_cart')->count();

        if($count == 0) {
            // create a new one
            DB::table('shopping_cart')->insert([
                'user_id' => 0, // it is for no user, default one
                'date' => now(),
            ]);
            session()->put('shopping_cart_id', '1');    // first one will have id=1
        }        

        // back to main_page
        return Redirect('/');
    }

    function logout(){
        Session::flush();

        Auth::logout();

        return Redirect('login')->with('sucessLogout', 'Úspešne ste sa odhlásili!');
    }
}
