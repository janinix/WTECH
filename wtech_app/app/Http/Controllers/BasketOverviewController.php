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

    // from prehlad_produktov, quantity is only 1
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        //$product = Product::findOrFail($product_id);
        session()->put('shopping_cart_id', '1');
        $shopping_cart_id = session()->get('shopping_cart_id', '1'); // default value
        
        // Add the product to database
        // todo: shopping_cart_id
        //Session->get();
        DB::table('shopping_cart_item')->insert([
            'shopping_cart_id' => $shopping_cart_id,
            'product_id' => $product_id,
            'quantity' => 1,
        ]);


        return redirect()->back()->with('success', 'Product added to the cart successfully!');
    }

    // from prehlad_produktov, quantity is set by user 
    public function addProductDetail(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        session()->put('shopping_cart_id', '1');
        $shopping_cart_id = session()->get('shopping_cart_id', '1'); // default value
        

        // Add the product to database
        // ...
        
        DB::table('shopping_cart_item')->insert([
            'shopping_cart_id' => $shopping_cart_id,
            'product_id' => $product_id,
            'quantity' => $quantity,
        ]);
        
        //return $request->product_id;

        return redirect('/prehlad_produktov');
    }

    public function updateQuantity(Request $request, $id)
    {   
        $quantity = $request->input('quantity');
        
        // update in database
        $affectedRows = DB::table('shopping_cart_item')
        ->join('shopping_cart', 'shopping_cart.id', '=', 'shopping_cart_item.shopping_cart_id')
        ->join('product', 'product.id', '=', 'shopping_cart_item.product_id')
        ->where('shopping_cart_item.shopping_cart_id', $id)
        ->update(['shopping_cart_item.quantity' => $quantity]);

        // quantity predava dobre
        //return $quantity;
        
        return redirect()->back();
    }

    public function productDelete($id)
    {
        // Delete the item from the database
        $shopping_cart_id = session()->get('shopping_cart_id', '1'); // 1 is default value if not set
        DB::table('shopping_cart_item')->where('id', $id)->where('shopping_cart_id', $shopping_cart_id)->delete();

        //return $id;

        // Redirect back to the page, autoreload...
        return redirect()->back();
    }
}

