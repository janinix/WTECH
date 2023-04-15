<?php

namespace App\Http\Controllers;

use App\Models\Order_info;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShoppingCartInfoDeliveryPayment extends Controller
{
    function validate_info(Request $request)
    {
        $request->validate([
            'phone_number' =>   'required',
            'street'       =>   'required',
            'house_number' =>   'required',
            'city'         =>   'required',
            'postal_code'  =>   'required',
            'country'      =>   'required'
        ]);

        $data = $request->all();

        if(Auth::check()){
            $user = Auth::user();
            $name = $user->name;
            $email = $user->email;
        }else{
            $request->validate([
                'name'         =>   'required',
                'email'        =>   'required|email|unique:users'
            ]);

            $name=  $data['name'];
            $email = $data['email'];
        }

        Order_info::create([
            'name'         =>  $name,
            'email'        =>  $email,
            'phone_number' =>  $data['phone_number'],
            'street'       =>  $data['street'],
            'house_number' =>  $data['house_number'],
            'city'         =>  $data['city'],
            'postal_code'  =>  $data['postal_code'],
            'country'      =>  $data['country']
        ]);

        return redirect('main_page')->with('successReg', 'Vaša objednávka bola odoslaná');
    }
}
