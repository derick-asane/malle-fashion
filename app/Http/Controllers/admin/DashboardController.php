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
    $data = order::all();
    $usersCount = User::count();
    $ordersCount = Order::count();
    $deliveredOrdersCount = Order::where('status', 'delivered')->count();

    return view('admin.dashboard', compact('usersCount', 'ordersCount', 'deliveredOrdersCount', 'data'));
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
}
