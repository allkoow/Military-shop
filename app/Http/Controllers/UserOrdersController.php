<?php

namespace App\Http\Controllers;

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
}
