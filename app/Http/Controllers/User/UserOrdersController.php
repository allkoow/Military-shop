<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Orders;
use Illuminate\Support\Facades\Auth;

class UserOrdersController extends Controller
{
    public function index()
    {
    	$orders = Auth::user()->orders;

    	return view('userpanel.orders.index', compact('orders'));
    }

    public function show($orderId) {
    	$order = Orders::find($orderId);
    	
    	return view('userpanel.orders.show', compact('order'));
    }
}
