<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class BasketOverviewController extends Controller
{
    public function index(Request $request)
    {
        //$cart = DB::table('shopping_cart')->select('id', 'user_id')->where('user_id','0');
        //$basket_items_db = DB::table('product')->select('name', 'price', 'description')->get();
        //$basket_items_session = Session::get('basket_items', collect());
        $basket_items = DB::table('product')->select('name', 'price', 'description')->get();

        //$basket_items = $basket_items_session->merge($basket_items_db);
        //$basket_items = Product::all();
        //return redirect('kosik_prehlad')->with('oblecenie', 'Filter done');
        //return view('kosik_prehlad', compact('basket_items'));
        return view('kosik_prehlad')->with('basket_items', $basket_items);
        //return view('kosik_prehlad', compact('basket_items'));
    }

    public function payement(Request $request)
    {
        // get values
        $deliveryMethod = $request->input('delivery_method');
        $paymentMethod = $request->input('payment_method');

        // Store selected values in the session
        $request->session()->put('delivery_method', $request->input('delivery_method'));
        $request->session()->put('payment_method', $request->input('payment_method'));

        $basket_items = DB::table('product')->select('name', 'price', 'description')->get();

        return view('kosik_zhrnutie')->with('basket_items', $basket_items);
        //return redirect()->route('kosik_zhrnutie')->with('basket_items', $basket_items);
        //return redirect('kosik_zhrnutie', compact('basket_items'));
    }

    public function sumarise(Request $request)
    {
        // get values
            
        return redirect('main_page');
    }

    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = Product::findOrFail($product_id);
        
        
        // Add the product to database
        // ...
        // todo: this change.
        DB::table('cart_items')->insert([
            'product_id' => $product->id,
            'quantity' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        


        return redirect()->back()->with('success', 'Product added to the cart successfully!');
    }
}

