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
        $user_id = DB::table('users')
                            ->orderByDesc('id')
                            ->value('id');
        // create a new one
        DB::table('shopping_cart')->insert([
            'user_id' => $user_id,
            'date' => now(),
        ]);
        // set cart_id to session to use it everywhere
        $latest_cart_id = DB::table('shopping_cart')
                            ->orderByDesc('id')
                            ->value('id');
        session()->put('shopping_cart_id', $latest_cart_id);

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
            //return "jhaskfdh";

            // do not sert card_it for admin
            if($credentials['username']=='admin' and $credentials['password']=='admin1'){
                return redirect('admin_pouzivatelia');
            }
            else {
                // create new shopping cart for user if not exists for specific user
                $users_id = DB::table('users')->select('id', 'username')->where('username', $credentials['username'])->first();
                $users_cart_id = -1;
                $users_cart_id = DB::table('shopping_cart')->select('id', 'user_id')->where('user_id', $users_id->id)->first();
                // new user, sotre on a session as currently active shopping_cart_id or module ?
                if($users_cart_id->id == -1 || $users_cart_id->id == null) {
                    // create a new one
                    DB::table('shopping_cart')->insert([
                        'user_id' => $users_id,
                        'date' => now(),
                    ]);
                    $latest_cart_id = DB::table('shopping_cart')
                                        ->orderByDesc('id')
                                        ->value('id');
                    session()->put('shopping_cart_id', $latest_cart_id->id);
                }
                else {
                    session()->put('shopping_cart_id', $users_cart_id->id);
                }

                //return $users_cart_id->id;
                
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
