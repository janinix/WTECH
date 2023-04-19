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
        session()->put('shopping_cart_id', '1');


        $shopping_cart_id = session()->get('shopping_cart_id');
        DB::table('shopping_cart_item')->insert([
            'shopping_cart_id' => $shopping_cart_id,
            'product_id' => $product_id,
            'quantity' => 1,
        ]);


        return redirect()->back()->with('success', 'Product added to the cart successfully!');
    }

    public function addProductDetail(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        session()->put('shopping_cart_id', '1');
        $shopping_cart_id = session()->get('shopping_cart_id', '1'); // default value



        DB::table('shopping_cart_item')->insert([
            'shopping_cart_id' => $shopping_cart_id,
            'product_id' => $product_id,
            'quantity' => $quantity,
        ]);

        return redirect('/prehlad_produktov');
    }

    public function updateQuantity(Request $request, $id)
    {
        $quantity = $request->input('quantity');

        $affectedRows = DB::table('shopping_cart_item')
        ->join('shopping_cart', 'shopping_cart.id', '=', 'shopping_cart_item.shopping_cart_id')
        ->join('product', 'product.id', '=', 'shopping_cart_item.product_id')
        ->where('shopping_cart_item.shopping_cart_id', $id)
        ->update(['shopping_cart_item.quantity' => $quantity]);



        return redirect()->back();
    }

    public function productDelete($id)
    {
        // Delete the item from the database
        $shopping_cart_id = session()->get('shopping_cart_id', '1'); // 1 is default value if not set
        DB::table('shopping_cart_item')->where('id', $id)->where('shopping_cart_id', $shopping_cart_id)->delete();

        return redirect()->back();
    }
}

