<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $commandes = Commande::with('client')->get();

        return view('commandes.index', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        $produits = Produit::all();
        return view('commandes.create', compact('clients', 'produits'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date_commande' => 'required|date',
            'produits' => 'required|array',
        ]);

        // Création de la commande
        $commande = Commande::create([
            'client_id' => $validated['client_id'],
            'date_commande' => $validated['date_commande'],
            'total' => 0, // temporaire
        ]);

        $total = 0;

        // Attacher les produits avec quantité
        foreach ($request->produits as $produitId => $data) {
            if (isset($data['checked'])) {
                $quantite = max(1, (int) $data['quantite']);
                $commande->produits()->attach($produitId, ['quantite' => $quantite]);

                $produit = Produit::find($produitId);
                $total += $produit->prix * $quantite;
            }
        }

        // Mise à jour du total
        $commande->update(['total' => $total]);

        return redirect()->route('commandes.index')->with('success', 'Commande créée avec succès !');
    }


    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
{
    $commande->load('client', 'produits');
    return view('commandes.show', compact('commande'));
}


    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Commande $commande)
{
    $clients = Client::all();
    $produits = Produit::all();

    // Charger les produits liés à la commande
    $commande->load('produits');

    return view('commandes.edit', compact('commande', 'clients', 'produits'));
}


    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, Commande $commande)
{
    $validated = $request->validate([
        'client_id' => 'required|exists:clients,id',
        'date_commande' => 'required|date',
        'produits' => 'required|array',
    ]);

    $commande->update([
        'client_id' => $validated['client_id'],
        'date_commande' => $validated['date_commande'],
    ]);

    // Détacher tous les anciens produits
    $commande->produits()->detach();

    $total = 0;

    // Re-attacher les produits sélectionnés
    foreach ($request->produits as $produitId => $data) {
        if (isset($data['checked'])) {
            $quantite = max(1, (int) $data['quantite']);
            $commande->produits()->attach($produitId, ['quantite' => $quantite]);

            $produit = Produit::find($produitId);
            $total += $produit->prix * $quantite;
        }
    }

    $commande->update(['total' => $total]);

    return redirect()->route('commandes.show', $commande->id)->with('success', 'Commande mise à jour avec succès !');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        //
    }
}
