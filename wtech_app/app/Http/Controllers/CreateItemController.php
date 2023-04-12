<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreateItemController extends Controller
{
    public function create_item(Request $request)
    {
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

        DB::table('product')->insert([
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

        return redirect('admin_produkty')->with('success', 'Product added successfully!');
    }
}
