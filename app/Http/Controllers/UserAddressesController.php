<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Addresses;

class UserAddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Auth::user()->addresses;
        
        return view('userpanel.addresses.index',compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userpanel.addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'city' => 'required',
            'street' => 'required',
            'housenumber' => 'required|numeric',
            'apartmentnumber' => 'numeric',
            'postcode' => 'required'
        ],
        [
            'name.required' => 'Nie podano nazwy',
            'city.required' => 'Nie podano nazwy miasta',
            'street.required' => 'Nie podano ulicy',
            'housenumber.required' => 'Nie podano numeru domu',
            'housenumber.numeric' => 'Podany numer domu nie jest liczbą',
            'apartmentnumber.numeric' => 'Podany numer lokalu nie jest liczbą',
            'postcode.required' => 'Nie podano kodu pocztowego'
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('addresses.create')
                        ->withErrors($validator)
                        ->withInput();
        } 
        else {
            $data = $request->all();

            $address = new Addresses();
            $address->name = $data['name'];
            $address->city = $data['city'];
            $address->street = $data['street'];
            $address->house_number = (int)$data['housenumber'];
            $address->apartment_number = (int)$data['apartmentnumber'];
            $address->postcode = $data['postcode'];
            $address->user_id = Auth::user()->id;
            $address->save();

            return redirect()->route('addresses.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $address = Addresses::find($id);

        return view('userpanel.addresses.edit',compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'city' => 'required',
            'street' => 'required',
            'house_number' => 'required|numeric',
            'apartment_number' => 'numeric',
            'postcode' => 'required'
        ],
        [
            'name.required' => 'Nie podano nazwy',
            'city.required' => 'Nie podano nazwy miasta',
            'street.required' => 'Nie podano ulicy',
            'house_number.required' => 'Nie podano numeru domu',
            'house_number.numeric' => 'Podany numer domu nie jest liczbą',
            'apartment_number.numeric' => 'Podany numer lokalu nie jest liczbą',
            'postcode.required' => 'Nie podano kodu pocztowego'
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->action('UserAddressesController@edit', ['id' => $id])
                        ->withErrors($validator)
                        ->withInput();
        } 
        else {
            $data = $request->all();

            $address = Addresses::find($id);
            $address->name = $data['name'];
            $address->city = $data['city'];
            $address->street = $data['street'];
            $address->house_number = $data['housenumber'];
            $address->postcode = $data['postcode'];


            if(!$data['apartmentnumber']) {
                $address->apartment_number = $data['apartmentnumber'];
            }

            $address->save();

            return redirect()
                    ->action('UserAddressesController@edit', ['id' => $id])
                    ->with('editAddress','Wybrany adres został edytowany');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Addresses::find($id);
        $address->delete();

        return redirect()->route('addresses.index');
    }

    public function setDefaultAddress($id)
    {
        $user = User::find(Auth::user()->id);
        $user->update(['default_address' => $id]);
        $user->save();

        return redirect()->route('addresses.index');
    }
}
