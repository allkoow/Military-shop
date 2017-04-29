<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\DeliveryMethods;

class AdminDeliveriesController extends Controller
{
    public function index()
    {
    	$delivery_methods = DeliveryMethods::all();

    	return view('adminpanel.deliveries.index',compact('delivery_methods'));
    }

    public function update(Request $request)
    {
    	$methodsName = $request->input('methods_name');
    	$methodsCost = $request->input('methods_cost');

    	$methods = DeliveryMethods::all();

    	foreach ($methods as $key => $method) {
    		$method->name = $methodsName[$key];
    		$method->cost = $methodsCost[$key];
    		$method->save();
    	}

    	return redirect()->route('deliveries.index')->with('information','Zaktualizowano metody wysłki.');
    }

    public function store(Request $request)
    {
    	$newMethod = new DeliveryMethods();
    	$newMethod->name = $request->input('name');
    	$newMethod->cost = $request->input('cost');
    	$newMethod->save();

    	return redirect()->route('deliveries.index')->with('information','Dodano metodę wysyłki.');
    }
}
