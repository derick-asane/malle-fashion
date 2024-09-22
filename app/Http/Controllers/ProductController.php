<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role === 'admin'){

            $products = Product::all();
            return view('admin.product', compact('products'));
        }else{
            return view('client.shop');
        } 
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.addProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'gender' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048', // adjust the rules as needed
        ]);
    
        // Get the image from the request
        $image = $request->file('image');

        // Encode the image to Base64
        $imageData = base64_encode(file_get_contents($image));

        // Prepare the Base64 string with the appropriate prefix
        $base64Image = 'data:' . $image->getClientMimeType() . ';base64,' . $imageData;
        // Store the product using the create() method
        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'gender' => $request->input('gender'),
            'price' => $request->input('price'),
            'image' => $base64Image,
        ]);

        // Return a response
        return redirect()->route('admin.product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }
    public function showProductEditform()
    {
        return view('product.editProduct');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
