<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Orders;
use App\Subcategories;
use App\Categories;
use App\Products;
use App\User;
use App\Addresses;

class AdminOrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::paginate(10);

        return view('adminpanel.orders.index', compact('orders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $order = Orders::find($id);

        return view('adminpanel.orders.show',compact(['order','address']));
    }

    public function edit($id)
    {
        Orders::where('id',$id)->update(['status' => 'wysłano']);
        return redirect()->route('orders.show',['order' => $id]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
