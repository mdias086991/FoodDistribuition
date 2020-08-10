<?php

namespace App\Http\Controllers;

use App\Address;
use App\Client;

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
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $client = Client::findOrFail($request->id_client);

        $addressData = new Address();
        
        $addressData->id_client = $client->id;
        $addressData->cep = $request->cep;
        $addressData->patio = $request->patio;
        $addressData->neighborhood = $request->neighborhood;
        $addressData->complemento = $request->complemento;
        $addressData->number = $request->number;
        $addressData->city = $request->city;
        $addressData->state = $request->state;
        $addressData->status = $request->status;

        $addressData->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $address = Address::where('status', 1)->first();

        if ($address) {
            $address->status = 0;
        }

        $address_obj = Address::findOrFail($request->address_id);
        $address_obj->status = 1;
        $address_obj->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy($address)
    {
        $address = Address::findOrFail($address);

        $address->delete();

       return redirect()->back();
    }
}
