<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Products;
use App\User;
use App\Categories;
use App\Subcategories;
use App\Addresses;

class UserpanelController extends Controller
{
    private function getHeaderData()
    {
        $categories = Categories::all();
        $subcat = Subcategories::all();
        return array( "categories" => $categories, "subcategories" => $subcat);
    }

    public function index()
    {
        $header = $this->getHeaderData();
        $categories = $header['categories'];
        $subcat = $header['subcategories'];

        return view('userpanel.index',compact(['categories','subcat']));
    }

    public function addresses()
    {
        $header = $this->getHeaderData();
        $categories = $header['categories'];
        $subcat = $header['subcategories'];
        $addresses = DB::table('addresses')
                        ->where('user_id','=',$user->id)
                        ->get();
        
        return view('userpanel.addresses',compact(['categories','subcat','addresses']));
    }

    public function orders()
    {
        $header = $this->getHeaderData();
        $categories = $header['categories'];
        $subcat = $header['subcategories'];

        $orders = DB::table('orders')->where('user_id','=',$user->id)->get();

        return view('userpanel.orders',compact(['categories','subcat','orders']));
    }

    public function settings()
    {
        $header = $this->getHeaderData();
        $categories = $header['categories'];
        $subcat = $header['subcategories'];

        return view('userpanel.settings',compact(['categories','subcat']));
    }

    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'phonenumber' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->action('UserpanelController@settings')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = array('id' => $request->input('id'),
                      'name' => $request->input('name'),
                      'surname' => $request->input('surname'),
                      'phonenumber' => $request->input('phonenumber') );

        DB::table('users')
                    ->where('id',$data['id'])
                    ->update(['name' => $data['name'],
                              'surname' => $data['surname'],
                              'phone_number' => $data['phonenumber']]);

        return redirect()->action('UserpanelController@settings');
    }

    public function changePassword(Request $request)
    {
        $data = array('id' => $request->input('id'),
                      'passwordOld' => $request->input('passwordOld'),
                      'passwordNew' => $request->input('passwordNew'),
                      'passwordRepeat' => $request->input('passwordRepeat'));

        // Query -> Check old password in database 
        $password = DB::table('users')
                        ->where('id',$data['id'])
                        ->value('password');

        // If old password is correct, check if password new is the same password repeat
        if (Hash::check($data['passwordOld'], $password)) {
            if ($data['passwordNew'] === $data['passwordRepeat']) {
                
                $validator = Validator::make(
                    $request->all(), 
                    [
                        'passwordNew' => 'required|max:20|min:8'
                    ],
                    [
                        'passwordNew.required' => 'Nie podano nowego hasła',
                        'passwordNew.min' => 'Nowe hasło musi mieć co najmniej 8 znaków',
                        'passwordNew.max' => 'Nowe hasło może mieć maksymalnie 20 znaków',
                    ]
                );

                if ($validator->fails()) {
                return redirect()
                        ->action('UserpanelController@settings')
                        ->withErrors($validator)
                        ->withInput();
                }

                DB::table('users')
                        ->where('id',$data['id'])
                        ->update(['password' => bcrypt($data['passwordNew'])]);
                
                return redirect()->action('UserpanelController@settings')->with('changePassword','Hasło zostało zmienione.');
            } else {
                return redirect()->action('UserpanelController@settings')->with('changePassword','Podane hasła nie są identyczne.');
            } 
        } else {
            return redirect()->action('UserpanelController@settings')->with('changePassword','Podane hasło jest niepoprawne.');
        }
    }

    public function setDefaultAddress($id)
    {
        DB::table('users')
            ->where('id',Auth::user()->id)
            ->update(['default_address' => $id]);

        return redirect()->action('UserpanelController@addresses');
    }

    public function editAddress($id)
    {
        $address = DB::table('addresses')
                        ->where('id',$id)->first();

        $header = $this->getHeaderData();
        $user = $this->getUser();
        $categories = $header['categories'];
        $subcat = $header['subcategories'];

        return view('userpanel.editaddress',compact(['categories','subcat','user','address']));
    }

    public function updateAddress(Request $request)
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

        $addressId = $request->input('id');

        if ($validator->fails()) {
            return redirect()
                        ->action('UserpanelController@editAddress', ['id' => $addressId])
                        ->withErrors($validator)
                        ->withInput();
        } 
        else {
            $data = array('name' => $request->input('name'),
                          'city' => $request->input('city'),
                          'street' => $request->input('street'),
                          'housenumber' => $request->input('housenumber'),
                          'apartmentnumber' => $request->input('apartmentnumber'), 
                          'postcode' => $request->input('postcode') );

            DB::table('addresses')
                ->where('id',$addressId)
                ->update(['name' => $data['name'],
                          'city' => $data['city'],
                          'street' => $data['street'],
                          'house_number' => $data['housenumber'],
                          'postcode' => $data['postcode']
                          ]);

            if(!$data['apartmentnumber']) {
                DB::table('address')
                    ->where('id',$addressId)
                    ->update(['apartment_number' => $data['apartmentnumber']]);
            }

            return redirect()
                    ->action('UserpanelController@editAddress', ['id' => $addressId])
                    ->with('editAddress','Wybrany adres został edytowany');
        }
    }

    public function deleteAddress($id)
    {
        $defaultAddress = DB::table('users')
                            ->where('id',Auth::user()->id)
                            ->value('default_address');

        if($defaultAddress == $id) {
            return redirect()
                ->action('UserpanelController@addresses')
                ->with('deleteAddressError','Nie można usunąć domyślnego adresu.');
        } else {
            DB::table('addresses')
            ->where('id',$id)
            ->delete();

            return redirect()->action('UserpanelController@addresses');
        }
    }

    public function addAddress()
    {
        $header = $this->getHeaderData();
        $categories = $header['categories'];
        $subcat = $header['subcategories'];

        return view('userpanel.addaddress', compact(['categories','subcat']));
    }

    public function storeAddress(Request $request)
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
                        ->action('UserpanelController@addAddress')
                        ->withErrors($validator)
                        ->withInput();
        } 
        else {
            $data = array('name' => $request->input('name'),
                          'city' => $request->input('city'),
                          'street' => $request->input('street'),
                          'housenumber' => $request->input('housenumber'),
                          'apartmentnumber' => $request->input('apartmentnumber'), 
                          'postcode' => $request->input('postcode') );

            DB::table('addresses')
                ->insert(['name' => $data['name'],
                          'city' => $data['city'],
                          'street' => $data['street'],
                          'house_number' => $data['housenumber'],
                          'apartment_number' => $data['apartmentnumber'],
                          'postcode' => $data['postcode'],
                          'user_id' => Auth::user()->id
                          ]);

            return redirect()->action('UserpanelController@addresses');
        }
    }
}
