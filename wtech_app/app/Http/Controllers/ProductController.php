<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product_vyziva()
    {
        return redirect('prehlad_produktov')->with('vyziva', 'Filter done');
    }
    public function product_oblecenie()
    {
        return redirect('prehlad_produktov')->with('oblecenie', 'Filter done');
    }
    public function product_prislusenstvo()
    {
        return redirect('prehlad_produktov')->with('prislusenstvo', 'Filter done');
    }
    public function product_potraviny()
    {
        return redirect('prehlad_produktov')->with('potraviny', 'Filter done');
    }
    public function product_vyhladavanie(Request $request)
    {
        $vyhladavanie = $request->input('search');
        return redirect('prehlad_produktov')->with('vyhladavanie',$vyhladavanie);
    }

    public function product_filter_cena(Request $request)
    {
        $cena = $request->input('cost');
        return redirect('prehlad_produktov')->with('cost',$cena);
    }

    public function product_filter_znacka(Request $request)
    {
        $znacka = $request->input('znacka');
        return redirect('prehlad_produktov')->with('znacka',$znacka);
    }

    public function price_down()
    {
        return redirect('prehlad_produktov')->with('price_down',"cena nadol");
    }

    public function price_up()
    {
        return redirect('prehlad_produktov')->with('price_up',"cena nahor");
    }

    public function product_detail($product_id)
    {
        config(['globals.global_prod_id' => $product_id]);
        
        return redirect('product_detail')->with('detail',$product_id);
    }

}
