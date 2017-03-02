<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Brands;

class AdminBrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brands::all();
        return view('adminpanel.brands.index',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [ 'newBrand' => 'required' ],
            [ 'newBrand.required' => 'Nie podano nazwy nowej marki']
        );

        if($validator->fails()) {
            return redirect()->route('brands.index')->withErrors($validator);
        } else {
            $brands = Brands::all();
            $newBrandName = $request->input('newBrand');

            foreach($brands as $brand) {
                if($brand->name == $newBrandName) {
                    return redirect()->route('brands.index')->withErrors(['brandExists','Marka o podanej nazwie istnieje już w bazie danych.']);
                }
            }

            $newBrand = new Brands();
            $newBrand->name = $newBrandName;
            $newBrand->save();

            return redirect()->route('brands.index')->with('storeInfo','Nowa marka została dodana do bazy danych.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $brands = Brands::all();

        foreach($brands as $brand) {
            $updatedBrand = Brands::find($brand->id);
            $updatedBrand->name = $request->input($brand->id);
            $updatedBrand->save();
        }

        return redirect()->route('brands.index')->with('updateInfo','Zmieniono nazwy marek.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
