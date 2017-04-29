<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\DeliveryMethods;
use App\PaymentMethod;
use App\Orders;
use App\Products;
use App\Sizes;
use App\Addresses;
use App\AddressBuilder;

class OrderController extends Controller
{
    public function index() {
    	echo 'order index';
    }

    public function create() {
    	$deliveryMethods = DeliveryMethods::all();
    	$paymentMethods = PaymentMethod::all();

    	$cart = Session::has('cart') ? Session::get('cart') : null;

    	return view('order.create', compact(['deliveryMethods', 'paymentMethods', 'cart']));
    }

    public function summary(Request $request) {
        $data = $request->all();
        $cart = Session::get('cart');
        
        // Add new order
        $order = new Orders();
        $order->user_id = Auth::user()->id;
        $order->status = 'oczekiwanie na płatność';
        $order->delivery_method_id = $data['delivery'];
        $order->payment_method_id = $data['payment'];
        $order->value = $cart->totalPrice;

        Session::put('order', $order);
        
        if($data['address'] === 'new') {
            $address = new Addresses();

            if($address->validate($data)) {
                $address = AddressBuilder::build($data);
            }
            else {
                return redirect()
                    ->route('order.create')
                    ->withErrors($address->errors())
                    ->withInput();
            }
        }
        else {
            $order->address_id = $data['address'];
            $address = Addresses::find($order->address_id);
        }

        $delivery = DeliveryMethods::find($order->delivery_method_id);
        $payment = PaymentMethod::find($order->payment_method_id);

        Session::put('delivery', $delivery);
        Session::put('address', $address);
        Session::put('payment', $payment);
        
        return view('order.summary', compact(['cart', 'order', 'address', 'payment', 'delivery']));
    }

    public function store(Request $request) {
    	
        $confirmation = $request->input('confirmation');
        $order = Session::get('order');
        $cart = Session::get('cart');
        
        if($confirmation) {
            $order->save();

            //Add items to orders_has_products table and update products table
            foreach ($cart->items as $item) {
                $order->products()->attach($item['id'], ['order_id' => $order->id]);

                $product = Products::find($item['id']);
                $product->number -= $item['quantity'];
                $product->save();

                // Update number of sizes
                $size = Sizes::where('name',$item['size'])->select('id')->first();
                $number = $product->sizes()->find($size->id)->pivot->number - $item['quantity'];
                $product->sizes()->updateExistingPivot($size->id, ['number' => $number]);
            }

            return redirect()->route('order.confirm');
        }
        else {
            $address = Session::get('address');
            $payment = Session::get('payment');
            $delivery = Session::get('delivery');

            $confirmation_error = 'Żeby dokończyć zakupy, musisz zaakceptować regulamin';
            return view('order.summary', compact(['cart', 'order', 'confirmation_error', 'address', 'payment', 'delivery']));
        }
    }

    public function confirm() {

        Session::forget('cart');
        Session::forget('order');

        return view('order.confirmation');
    }
}
