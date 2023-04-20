<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function delete_user($user_id) {
        DB::table('users')->where('id', $user_id)->delete();
        return redirect('admin_pouzivatelia')->with('successDelUser', 'Vymazanie úspešné.');
    }

    public function delete_product($product_id) {
        DB::table('product')->where('id', $product_id)->delete();
        return redirect('admin_produkty')->with('successDelProd', 'Vymazanie úspešné.');
    }

    public function edit_product($product_id) {
        // set updating pproduct flag
        session()->put('admin_updating_product', TRUE);
        
        return redirect('admin_produkty');
    }
}
