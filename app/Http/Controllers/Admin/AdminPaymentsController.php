<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\PaymentMethod;

class AdminPaymentsController extends Controller
{
    public function index()
    {
    	$paymentMethods = PaymentMethod::all();

    	return view('adminpanel.payments.index',compact('paymentMethods'));
    }

    public function update(Request $request)
    {
    	$methodsName = $request->input('methods_name');

    	$methods = PaymentMethod::all();

    	foreach ($methods as $key => $method) {
    		$method->name = $methodsName[$key];
    		$method->save();
    	}

    	return redirect()->route('payments.index')->with('information','Zaktualizowano sposoby płatności.');
    }

    public function store(Request $request)
    {
    	$newMethod = new PaymentMethod();
    	$newMethod->name = $request->input('name');
    	$newMethod->save();

    	return redirect()->route('payments.index')->with('information','Dodano sposób płatności.');
    }
}
