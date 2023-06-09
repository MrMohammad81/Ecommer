<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(15);

        return view('admin.orders.index' , compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.orders.show' , compact('order'));
    }
}
