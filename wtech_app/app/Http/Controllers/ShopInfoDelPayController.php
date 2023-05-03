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
            'name'         =>   'required',
            'email'        =>   'required',
            'phone_number' =>   'required',
            'street'       =>   'required',
            'house_number' =>   'required',
            'city'         =>   'required',
            'postal_code'  =>   'required',
            'country'      =>   'required'
        ]);

        $data = $request->all();

        $shopping_cart_id = DB::table('shopping_cart')
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
            'shopping_card_id' =>  $shopping_cart_id,
            'name'         =>  $name,
            'email'        =>  $email,
            'phone_number' =>  $data['phone_number'],
            'street'       =>  $data['street'],
            'house_number' =>  $data['house_number'],
            'city'         =>  $data['city'],
            'postal_code'  =>  $data['postal_code'],
            'country'      =>  $data['country']
        ]);

        // TODO: dorobiť
        // toto ešte update v shipping_cart
    
        //'date' => now(),
        //'user_id' => $user_id

        // prenositelnost - vymazat z historie, nastaviť cart_id pre vloženie objednavky
        if(session()->get('from_history') == TRUE) {
            $latest_cart_id = session()->get('shopping_cart_id');
            // uistime sa do buducnosti ze je FALSE
            session()->put('from_history', FALSE);
        }

        $new_cart_id = $shopping_cart_id + 1;

        if ($request->has('save_order')) {
            DB::table('shopping_history')->insert([
                'user_id' => $user_id,
                'shopping_cart_id' => $shopping_cart_id
            ]);

            return redirect('main_page')->with('successOrder', 'Vaša objednávka bola uložená');
        }

        if ($request->has('submit_order')) {
            DB::table('shopping_cart')->insert([
                'id' => $new_cart_id,
            ]);
            return redirect('main_page')->with('successOrder', 'Vaša objednávka bola odoslaná');
        }    

//        DB::table('shopping_cart')->insert([
//            'id' => $new_cart_id
//        ]);

//        return redirect('main_page')->with('successOrder', 'Vaša objednávka bola odoslaná');
    }

    public function options(Request $request){

        $data = $request->validate([
            'interest' => 'required',
            'payment' => 'required',
        ]);

        $selected_delivery = $data['interest'];
        $selected_payment = $data['payment'];
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
