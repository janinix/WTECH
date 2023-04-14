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

    public function product_detail($product_id)
    {
        return redirect('product_detail')->with('detail',$product_id);
    }

}
