<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $user_id = auth()->user()->id;
        $cartItems = Cart::where('user_id', $user_id)->with('product:id,price,name,image_path')->get();

        return view('client.cart', compact('cartItems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addToCart($product_id)
    {   

        // Check if the product already exists in the cart for the current user
        $existingCartItem = Cart::where('user_id', auth()->user()->id)
            ->where('product_id', $product_id)
            ->first();

        if($existingCartItem) {
        // Product already exists in the cart, handle this scenario as needed
        return redirect()->route('client.shop')->with('warn', 'Product is already in the cart.');
        }

        // Create a new cart item using the create method
        $cartItem = Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product_id ,
        ]);
         // Check if the cart item was successfully created
        if($cartItem) {
            // Redirect back to the current page with a success message
            return redirect()->route('client.shop')->with('success', 'Product added to cart successfully!');
        } else {
            // Handle the case where the cart item creation fails
            return redirect()->route('client.shop')->with('error', 'Failed to add product to cart. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
        public function destroy($id)
        {
            if (Auth::check()) {
                 // Get authenticated user's ID
                $userId = auth()->user()->id;

                // Find the cart associated with the user
                $cart = Cart::where('user_id', $userId)->first();

                if (!$cart) {
                    // Return an error message or redirect to a specific page
                    return back()->withError('You do not have a cart');
                    
                }

                // Find and delete cart item
                $cart->delete();
            }
            return back();
        }



        public function updateQuantity(Request $request , $id)
        {
             // Get the currently authenticated user
            $user = auth()->user()->id;

            // Find the cart item by id associated with the logged-in user
            $cartItem = Cart::where('id', $id)
                            ->where('user_id', $user)
                            ->first();

            // Update the quantity based on user input
            if ($cartItem) {
                $cartItem->quantity = $request->input('quantity');
                $cartItem->save();
            
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        }
}
