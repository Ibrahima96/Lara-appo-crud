<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clients.index', ['clients' => Client::all()]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        $validated = $request->validated();
        Client::create($validated);

        return redirect()->route('clients.index')->with( 'success',' enregistrer avec success !');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {

        return view('clients.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(ClientRequest $request, Client $client)
    // {
    //     $validated = $request->validated();

    //      $client->update( $validated);
    //      dd($client);
    //       return redirect()->route('clients.index')->with( 'success',' enregistrer avec success !');
    // }

     public function update(Request $request, $id)
{
    $client = Client::findOrFail($id);

    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'email' => 'required|email|unique:clients,email,' . $client->id,
        'telephone' => 'nullable|string|max:20',
    ]);

    $client->update($validated);

    return redirect()->route('clients.index')->with('success', 'Client mis à jour !');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with( 'success',' supprimer avec success !');

    }
}
