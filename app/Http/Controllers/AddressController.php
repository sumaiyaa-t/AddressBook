<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $addresses = auth()->user()->address;
        $addresses = Address::all();
        return view('address.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $inputs = \request()->validate([
            'user_name' => 'required',
            'tel' => 'required',
            'address' => 'required'
        ]);

        auth()->user()->address()->create($inputs);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Address $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Address $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        if (auth()->user()->id == $address->user_id) {
            return view('address.edit', compact('address'));

        } else {
            return 'Access Denied';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Address $address
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $address=Address::find($id);
        $inputs = \request()->validate([
            'user_name' => 'required',
            'tel' => 'required',
            'address' => 'required'
        ]);

       $address->update($inputs);
        return redirect()->route('address.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Address $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {

        if (auth()->user()->id == $address->user_id) {
            $address->delete();
            return back();
        } else {
            return "Access Denied";
        }
    }
}
