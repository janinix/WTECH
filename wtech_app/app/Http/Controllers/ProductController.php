<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Cache;


class ProductController extends Controller
{
    public function product_vyziva()
    {
        Cache::put('main_category', "vyziva", 60 * 60);
        return redirect('prehlad_produktov')->with('vyziva', 'Filter done');
    }
    public function product_oblecenie()
    {
        Cache::put('main_category', "oblecenie", 60 * 60);
        return redirect('prehlad_produktov')->with('oblecenie', 'Filter done');
    }
    public function product_prislusenstvo()
    {
        Cache::put('main_category', "prislusenstvo", 60 * 60);
        return redirect('prehlad_produktov')->with('prislusenstvo', 'Filter done');
    }
    public function product_potraviny()
    {
        Cache::put('main_category', "potraviny", 60 * 60);
        return redirect('prehlad_produktov')->with('potraviny', 'Filter done');
    }
    public function product_vyhladavanie(Request $request)
    {
        $vyhladavanie = $request->input('search');
        Cache::forget('main_category');
        return redirect('prehlad_produktov')->with('vyhladavanie',$vyhladavanie);
    }

    public function product_filter_cena(Request $request)
    {
        $main_category = Cache::get('main_category');
        $cena = $request->input('cost');
        if ($main_category!=NULL) {
            return redirect('prehlad_produktov')->with('cost', $cena)->with('main_category', $main_category);
        }
        else {
            Cache::forget('main_category');
            return redirect('prehlad_produktov')->with('cost',$cena)->with('main_category', "basic");
        }
        
    }

    public function product_filter_znacka(Request $request)
    {
        $znacka = $request->input('znacka');
        Cache::forget('main_category');
        return redirect('prehlad_produktov')->with('znacka',$znacka);
    }

    public function price_down()
    {
        $main_category = Cache::get('main_category');
        if ($main_category!=NULL) {
            return redirect('prehlad_produktov')->with('price_down',$main_category);
        }
        else {
            Cache::forget('main_category');
            return redirect('prehlad_produktov')->with('price_down',"cena_dole");
        }
        
    }

    public function price_up()
    {
        $main_category = Cache::get('main_category');
        if ($main_category!=NULL) {
            
            return redirect('prehlad_produktov')->with('price_up',$main_category);
        }
        else {
            Cache::forget('main_category');
            return redirect('prehlad_produktov')->with('price_up',"cena_hore");
        }
    }

    public function product_detail($product_id)
    {
        config(['globals.global_prod_id' => $product_id]);
        
        return redirect('product_detail')->with('detail',$product_id);
    }

}
