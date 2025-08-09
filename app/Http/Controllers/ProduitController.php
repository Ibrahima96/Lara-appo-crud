<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitRequest;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('produits.index', ['produits' => Produit::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProduitRequest $request)
    {

        $validated = $request->validated();
        Produit::create($validated);
       

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès !');

    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
       return view('produits.edit',compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProduitRequest $request, Produit $produit)
    {
        $validated = $request->validated();
        $produit->update($validated);
       

        return redirect()->route('produits.index')->with('success', 'Produit modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès !');
    }
}
