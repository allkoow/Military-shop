<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Addresses;
use App\AddressBuilder;

class UserAddressesController extends Controller
{
    public function index()
    {
        $addresses = Auth::user()->addresses;
        
        return view('userpanel.addresses.index',compact('addresses'));
    }

    public function create()
    {
        return view('userpanel.addresses.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $address = new Addresses();

        if($address->validate($data)) {
            $address = AddressBuilder::build($data);

            return redirect()->route('addresses.index');
        }
        else {
            return redirect()
                    ->route('addresses.create')
                    ->withErrors($address->errors())
                    ->withInput();
        }

    }

    public function edit($id)
    {
        $address = Addresses::find($id);

        return view('userpanel.addresses.edit',compact('address'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $address = new Addresses();

        if($address->validate($data)) {
            $address = AddressBuilder::build($data);

            return redirect()
                    ->route('addresses.edit', ['id' => $id])
                    ->with('editAddress','Wybrany adres został edytowany');
        }
        else {
            return redirect()
                    ->route('addresses.edit', ['id' => $id])
                    ->withErrors($address->errors())
                    ->withInput();
        }
    }

    public function destroy($id)
    {
        $address = Addresses::find($id);
        $address->delete();

        return redirect()->route('addresses.index');
    }
}
