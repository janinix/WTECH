<?php

namespace App\Http\Controllers;

use App\Models\Order_info;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopInfoDelPayController extends Controller
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

        $shopping_card_id = DB::table('shopping_cart')
                            ->orderByDesc('id')
                            ->value('id');

//        $new_cart_id = $shopping_card_id + 1;

        $order_info = Order_info::latest()->first();

        if(Auth::check()){
            $user = Auth::user();
            $user_id = $user->id;
            $name = $user->name;
            $email = $user->email;
        }else{
            $request->validate([
                'name'         =>   'required',
                'email'        =>   'required|email|unique:users'
            ]);

            $user_id = null;
            $name=  $data['name'];
            $email = $data['email'];
        }

        $order_info->update([
            'user_id'      =>  $user_id,
            'shopping_card_id' =>  $shopping_card_id,
            'name'         =>  $name,
            'email'        =>  $email,
            'phone_number' =>  $data['phone_number'],
            'street'       =>  $data['street'],
            'house_number' =>  $data['house_number'],
            'city'         =>  $data['city'],
            'postal_code'  =>  $data['postal_code'],
            'country'      =>  $data['country']
        ]);

        $new_cart_id = $shopping_card_id + 1;

        DB::table('shopping_cart')->insert([
            'id' => $new_cart_id
        ]);

//        DB::table('shopping_cart')
//            ->where('id', $shopping_card_id)
//            ->update(['id' => $new_cart_id]);

        return redirect('main_page')->with('successOrder', 'Vaša objednávka bola odoslaná');
    }

    public function options(Request $request){

        $selected_delivery = $request->input('interest');
        $selected_payment = $request->input('payment');
        $card_number = null;
        if ($selected_payment=== 'bank_ucet' && !empty($request->input('card_number'))) {
            $card_number = $request->input('card_number');
        }

        Order_info::create([
            'delivery'    =>  $selected_delivery,
            'payment'     =>  $selected_payment,
            'card_number' =>  $card_number
        ]);

        return redirect('kosik_zhrnutie');
    }

}
