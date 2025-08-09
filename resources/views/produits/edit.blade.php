@extends('layouts.master')

@section('title', 'Modifier le Produit')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-yellow-600 text-center">Modifier le Produit</h1>

  

    <form action="{{ route('produits.update', $produit->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="form-control">
            <label class="label"><span class="label-text">Nom</span></label>
            <input type="text" name="nom" value="{{ old('nom', $produit->nom) }}" class="input input-bordered w-full" required>
        </div>

        <div class="form-control">
            <label class="label"><span class="label-text">Prix (€)</span></label>
            <input type="number" name="prix" value="{{ old('prix', $produit->prix) }}" step="0.01" class="input input-bordered w-full" required>
        </div>

        <div class="form-control">
            <label class="label"><span class="label-text">Stock</span></label>
            <input type="number" name="stock" value="{{ old('stock', $produit->stock) }}" class="input input-bordered w-full" min="0">
        </div>

        <div class="form-control">
            <label class="label"><span class="label-text">Description</span></label>
            <textarea name="description" rows="4" class="textarea textarea-bordered w-full">{{ old('description', $produit->description) }}</textarea>
        </div>

        <div class="text-center pt-4">
            <button type="submit" class="btn btn-warning">Mettre à jour</button>
            <a href="{{ route('produits.index') }}" class="btn btn-ghost ml-2">Annuler</a>
        </div>
    </form>
</div>
@endsection
