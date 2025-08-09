@extends('layouts.master')

@section('title', 'Ajouter un Produit')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-blue-600 text-center">Ajouter un Produit</h1>

    <form action="{{ route('produits.store') }}" method="POST" class="space-y-4">
        @csrf

        <div class="form-control">
            <label class="label"><span class="label-text">Nom</span></label>
            <input type="text" name="nom" class="input input-bordered w-full" required>
        </div>

        <div class="form-control">
            <label class="label"><span class="label-text">Prix (€)</span></label>
            <input type="number" name="prix" step="0.01" class="input input-bordered w-full" required>
        </div>

        <div class="form-control">
            <label class="label"><span class="label-text">Stock</span></label>
            <input type="number" name="stock" class="input input-bordered w-full" min="0" value="0">
        </div>

        <div class="form-control">
            <label class="label"><span class="label-text">Description</span></label>
            <textarea name="description" rows="4" class="textarea textarea-bordered w-full"></textarea>
        </div>

        <div class="text-center pt-4">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('produits.index') }}" class="btn btn-ghost ml-2">Annuler</a>
        </div>
    </form>
</div>
@endsection
