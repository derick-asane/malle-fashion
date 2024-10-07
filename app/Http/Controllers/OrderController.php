<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Cart;
use App\Models\Product;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;



class OrderController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required|string',
            'quarter' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'payment_method' => 'required|string',
            'mobile_number' => 'required|string'
        ]);

        //retrieving the amount passed in the parameter
        $amount=$request->query('total'); // Access the total value from the query parameters

        $user_id = auth()->user()->id;

        // Retrieve products from the cart for the user
        $cartItems = Cart::where('user_id', $user_id)->with('product')->get();

        // Check if the cart is empty
        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'Cart is empty.'], 400);
        }

        // Begin a database transaction
        DB::beginTransaction();

        try {
            // Create the order
            $order = Order::create([
                'user_id' => $user_id,
                'city' => $request->city,
                'quarter' => $request->quarter,
                'address' => $request->address,
                'phone' => $request->phone,
                
            ]);


            // Process the payment using a fictional payment API
            $paymentResponse = $this->processPayment($request->payment_method, $amount, $request->mobile_number);

            // Check if the payment was successful
            if ($paymentResponse['status'] === 'success') {
                // Attach products to the order
                foreach ($cartItems as $item) {
                    $order->products()->attach($item->product_id, ['quantity' => $item->quantity]);
                }

                // Create the payment record
                Payment::create([
                    'order_id' => $order->id,
                    'amount' => $amount,
                    'payment_method' => $request->payment_method,
                    'transaction_id' => $paymentResponse['transaction_id'],
                    'status' => 'completed',
                ]);

                // Clear the cart for the current user
                Cart::where('user_id', $user_id)->delete();

                // Commit the transaction
                DB::commit();

                


                $products = Product::all();
    
            return view('client.shop', compact('products'))->with('OrderSuccess', 'Order created successfully');
                

            } else {
                throw new Exception('Payment failed: ' . $paymentResponse['message']);
            }
        } catch (Exception $e) {
            DB::rollback();

            return response()->json([
                'message' => 'Failed to place order: ' . $e->getMessage(),
            ], 400);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    private function processPayment($paymentMethod, $amount, $mobileNumber)
    {
        // Here you would integrate with the actual payment API
        // This is a mock response for demonstration purposes
        return [
            'status' => 'success', // or 'failed'
            'transaction_id' => '123456', // Example transaction ID
            'message' => 'Payment processed successfully.',
        ];
    }

}

