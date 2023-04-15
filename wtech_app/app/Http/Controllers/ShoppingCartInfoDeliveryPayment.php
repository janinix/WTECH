<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ShoppingCartInfoDeliveryPayment extends Controller
{
    function validate_info(Request $request)
    {
        $request->validate([
            'name'         =>   'required',
            'email'        =>   'required|email|unique:users',
            'phone_number' =>   'required',
            'street'       =>   'required',
            'house_number' =>   'required',
            'city'         =>   'required',
            'postal_code'  =>   'required',
            'country'      =>   'required'
        ]);

//        $data = $request->all();

//        Order_info::create([
//            'name'         =>  $data['name'],
//            'email'        =>  $data['email'],
//            'phone_number' =>  $data['phone_number'],
//            'street'       =>  $data['street'],
//            'house_number' =>  $data['house_number'],
//            'city'         =>  $data['city'],
//            'postal_code'  =>  $data['postal_code'],
//            'country'      =>  $data['country']
//        ]);

        return redirect('main_page')->with('successReg', 'Vaša objednávka bola odoslaná');
    }
}
