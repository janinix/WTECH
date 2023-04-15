<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class BasketOverviewController extends Controller
{
    public function index()
    {
        //$cart = DB::table('shopping_cart')->select('id', 'user_id')->where('user_id','0');
        //$basket_items_db = DB::table('product')->select('name', 'price', 'description')->get();
        //$basket_items_session = Session::get('basket_items', collect());

        //$basket_items = $basket_items_session->merge($basket_items_db);
        //$basket_items = Product::all();
        //return redirect('kosik_prehlad')->with('oblecenie', 'Filter done');
        //return view('kosik_prehlad', compact('basket_items'));
        return view('kosik_prehlad');
    }
}
