<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserSettingsController extends Controller
{
    public function index()
    {
    	return view('userpanel.settings.index');
    }

    public function editInformation(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'surname' => 'required|max:20',
            'phone_number' => 'required'], [

            'name.required' => 'Nie podano imienia.',
            'name.max' => 'Podane imię posiada za dużo znaków.',
            'surname.required' => 'Nie podano nazwiska.',
            'surname.max' => 'Podane nazwisko posiada za dużo znaków.',
            'phone_number.required' => 'Nie podano numeru telefonu.'
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('userpanel.settings')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $request->all();

        $user = Auth::user();
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->phone_number = $data['phone_number'];
        $user->save();

        return redirect()->route('userpanel.settings');
    }

    public function editPassword(Request $request)
    {
        $data = $request->all();

        // Query -> Check old password in database 
        $password = Auth::user()->password;

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
                        ->route('userpanel.settings')
                        ->withErrors($validator)
                        ->withInput();
                }

                Auth::user()->password = bcrypt($data['passwordNew']);
                Auth::user()->save();

                return redirect()->route('userpanel.settings')->with('changePassword','Hasło zostało zmienione.');
            } else {
                return redirect()->route('userpanel.settings')->with('changePassword','Podane hasła nie są identyczne.');
            } 
        } else {
            return redirect()->route('userpanel.settings')->with('changePassword','Podane hasło jest niepoprawne.');
        }
    }
}
