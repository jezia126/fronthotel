<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::all()->toArray();
        return array_reverse($clients);     

    }
    public function store(Request $request)
    {
        $client = new Client([
            'npr' => $request->input('npr'),
            'adresse' => $request->input('adresse'),
            'email' => $request->input('email')
        ]);
        $client->save();

        return response()->json('Client créé !');

    }
    public function show($id)
    {
        $client = Client::find($id);
        return response()->json($client);
    }
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $client->update($request->all());

        return response()->json('Client MAJ !');

    }

    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();

        return response()->json('Client supprimé !');

    }





    //
}
