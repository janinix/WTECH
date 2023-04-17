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

    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        //$product = Product::findOrFail($product_id);
        
        
        // Add the product to database
        // todo: shopping_cart_id
        DB::table('shopping_cart_item')->insert([
            'shopping_cart_id' => 1,
            'product_id' => $product_id,
            'quantity' => 1,
        ]);      


        return redirect()->back()->with('success', 'Product added to the cart successfully!');
    }

    public function addProductDetail(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Add the product to database
        // ...
        
        DB::table('shopping_cart_item')->insert([
            'shopping_cart_id' => 1,
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
        /*
        $product = DB::table('shopping_cart')
        ->join('shopping_cart_item', 'shopping_cart.id', '=', 'shopping_cart_item.shopping_cart_id')
        ->join('product', 'product.id', '=', 'shopping_cart_item.product_id')
        ->select('shopping_cart.id', 'shopping_cart_item.quantity', 'product.name', 'product.price', 'product.image1')
        ->where('product.id', $id)->update(['shopping_cart_item.quantity' => $quantity]);
        */
        $affectedRows = DB::table('shopping_cart_item')
        ->join('shopping_cart', 'shopping_cart.id', '=', 'shopping_cart_item.shopping_cart_id')
        ->join('product', 'product.id', '=', 'shopping_cart_item.product_id')
        ->where('product.id', $id)
        ->update(['shopping_cart_item.quantity' => $quantity]);

        /*
        $shopping_cart_item_id = $request->input('shopping_cart_item_id');

        // update in database
        $affectedRows = DB::table('shopping_cart_item')
            ->where('id', $shopping_cart_item_id)
            ->update(['quantity' => $quantity]);
        */
        
            //return $quantity;
        
        return redirect()->back();
    }

    public function productDelete($id)
    {
        // Delete the item from the database
        DB::table('shopping_cart_item')->where('id', $id)->delete();

        //return $id;

        // Redirect back to the page, autoreload...
        return redirect()->back();
    }
}

