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

        $product_to_update = DB::table('products')->where('id', $product_id)->get();        
        session()->put('product_to_update', $product_to_update);


        return redirect('admin_produkty');
    }

    public function edit_product_save(Request $request, $product_id) {
        // update product in db

        DB::table('products')->where('id', $product_id)
        ->update([
            'name' => $request->name,
            'price' => $request->price,
            'rating' => $request->rating,
            'image1' => $request->image1,
            'image2' => $request->image2,
            'image3' => $request->image3,
            'description' => $request->description,

            // TODO: finish this
            'image2' => $request->image1,
            'image2' => $request->image1,
            // Add more columns as needed.
        ]); 

        /*
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
        */

     
        return redirect('admin_produkty');
    }
}
