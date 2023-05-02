<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class BasketOverviewController extends Controller
{
    public function index(Request $request)
    {
        $basket_items = DB::table('product')->select('name', 'price', 'description')->get();

        return view('kosik_prehlad')->with('basket_items', $basket_items);
        //return view('kosik_prehlad', compact('basket_items'));
    }

    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        //$product = Product::findOrFail($product_id);
        // Comment this when shopping_cart_id resolved ---
        $latest_cart_id = DB::table('shopping_cart')
                      ->orderByDesc('id')
                      ->value('id');
        session()->put('shopping_cart_id', $latest_cart_id);

        DB::table('shopping_cart_item')->insert([
            'shopping_cart_id' => $latest_cart_id,
            'product_id' => $product_id,
            'quantity' => 1,
        ]);


        return redirect()->back()->with('success', 'Product added to the cart successfully!');
    }

    public function addProductDetail(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        $latest_cart_id = DB::table('shopping_cart')
                      ->orderByDesc('id')
                      ->value('id');
        session()->put('shopping_cart_id', $latest_cart_id);

        DB::table('shopping_cart_item')->insert([
            'shopping_cart_id' => $latest_cart_id,
            'product_id' => $product_id,
            'quantity' => $quantity,
        ]);

        //LOG($quantity);

        return redirect('/prehlad_produktov');
    }

    public function default_cart_check()
    {
        $shopping_cart_id = session()->get('shopping_cart_id');

        // check if it is already in database:
        $count = DB::table('shopping_cart')->count();

        if($count == 0) {
            // create a new one
            DB::table('shopping_cart')->insert([
                'user_id' => null, // it is for no user, default set to null
                'date' => now(),
            ]);
            session()->put('shopping_cart_id', '1');    // first one will have id=1
        }
        else {
            // set shoping_cart_id to 1 as default, 
            if($shopping_cart_id == -1 || $shopping_cart_id == 0 || $shopping_cart_id == null) {
                $shopping_cart_id = 1;
                session()->put('shopping_cart_id', '1');   
            }
        }

        //LOG($count);
        
        return view('/main_page');
    }

    public function updateQuantity(Request $request, $id)
    {
        $quantity = $request->input('quantity');

        // no need to do where shoping_cart_id bc. we have id in item
        $affectedRows = DB::table('shopping_cart_item')
        ->join('shopping_cart', 'shopping_cart.id', '=', 'shopping_cart_item.shopping_cart_id')
        ->join('product', 'product.id', '=', 'shopping_cart_item.product_id')
        ->where('shopping_cart_item.id', $id)
        ->update(['shopping_cart_item.quantity' => $quantity]);

        //return $id;
        return redirect()->back();
    }

    public function productDelete($id)
    {
        // Delete the item from the database
        $shopping_cart_id = session()->get('shopping_cart_id');
        DB::table('shopping_cart_item')->where('id', $id)->where('shopping_cart_id', $shopping_cart_id)->delete();

        return redirect()->back();
    }
}

