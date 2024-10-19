<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
{
    // Example data, you can fetch this from your database
    $labels = ['July', 'August', 'September', 'October'];
    $data = [65, 59, 80, 81];

    
    $usersCount = User::count();
    $ordersCount = Order::count();
    $deliveredOrdersCount = Order::where('status', 'delivered')->count();

    return view('admin.dashboard', compact('usersCount', 'ordersCount', 'deliveredOrdersCount', 'data', 'labels'));
}

    public function getUsers()
    {
        $users = user::all();

        return view('admin.users', compact('users'));
    }

    public function getOrders()
    {
        $orders = Order::with('user')->get();

        return view('admin.orders', compact('orders'));
    }

    public function show($order_id)
    {
        
        $order = Order::with('products')->find($order_id);
        return view('admin.order_details', compact('order'));
    }

    
    public function updateStatus(Request $request, $order_id)
{
    // Validate the request data
    $request->validate([
        'status' => 'required|in:pending,delivered,cancelled,confirmed'
    ]);

    // Retrieve the order
    $order = Order::find($order_id);

    if (!$order) {
        // Return a 404 error if the order is not found
        return response()->json(['message' => 'Order not found'], 404);
    }

    // Update the order status
    $order->status = $request->input('status');
    $order->save();

    // Return a success response
    return response()->json(['message' => 'Order status updated successfully'], 200);
}

public function deliveredOrders()
{
    $delivered_orders= Order::where('status', 'delivered')->with('user')->get();
    return view('admin.deliver', compact('delivered_orders'));
}
}
