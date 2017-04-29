<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Categories;
use App\Subcategories;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Orders;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Orders::where('status', 'oczekiwanie na płatność')
                        ->orWhere('status', 'oczekiwanie na wysyłkę')->get();

        return view('adminpanel/index', compact('orders'));
    }
}
