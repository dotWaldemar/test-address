<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::orderBy('name', 'desc')->get();

        return view('form', compact('addresses'));
    }

    public function create(Request $request)
    {
        request()->validate([
            'name' => 'required|unique:address',
            'city' => 'required',
            'area' => 'required'
        ]);

        Address::create($request->all());
        
        return redirect('/')->with('message', 'Address created successfuly');
    }

    public function destroy($id)
    {
        $address = Address::find($id);
        $address->delete();

        return redirect('/')->with('message','Address deleted successfully');
    }

}
