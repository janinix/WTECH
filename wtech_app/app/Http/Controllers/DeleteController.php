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

        $product_to_update = DB::table('product')->where('id', $product_id)->first();        
        session()->put('product_to_update', $product_to_update);

        // to expand area
        session()->flash('show_expanded_area', true);

        return redirect('admin_produkty');
    }

    public function edit_product_save(Request $request) {
        // update product in db

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'rating' => 'required|integer',
            'category1' => 'required|max:255',
            'category2' => 'required|max:255',
            'category3' => 'max:255',
            'category4' => 'max:255',
            'description' => 'required',
            'image1' => 'required|max:255',
            'image2' => 'required|max:255',
            'image3' => 'max:255',
        ]);

        DB::table('product')->update([
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'rating' => $validatedData['rating'],
            'category1' => $validatedData['category1'],
            'category2' => $validatedData['category2'],
            'category3' => $validatedData['category3'],
            'category4' => $validatedData['category4'],
            'description' => $validatedData['description'],
            'image1' => $validatedData['image1'],
            'image2' => $validatedData['image2'],
            'image3' => $validatedData['image3'],
        ]);

        return redirect('admin_produkty');
    }
}
