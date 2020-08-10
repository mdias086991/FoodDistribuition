<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Address;

class ClientController extends Controller
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
        return view('dashboard.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $client = Client::create($data);

        
        if($client) {
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

            $client->createAddress($addressData);
            // $addressData->save();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clients = Client::find($id);
        $addresses = Address::where('id_client', $id)->get();
        
        return view('dashboard.clients.edit', compact('clients', 'addresses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->company_name = $request->company_name;
        $client->cnpj = $request->cnpj;
        $client->name_responsible = $request->name_responsible;
        $client->phone = $request->phone;
        $client->email = $request->email;

        $client->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($client)
    {
        $clients = Client::findOrFail($client);
        $addresses = Address::where('id_client', $client)->get(); 

       foreach($addresses as $address) { 
           $address->delete();
       }
        $clients->delete();

        return redirect('/home');
    }
}
