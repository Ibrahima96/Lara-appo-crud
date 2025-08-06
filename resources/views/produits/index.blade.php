@extends('layouts.app')

@section('title', 'Liste des Produits')

@section('content')
<div class="max-w-5xl mx-auto mt-10">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold text-blue-600">Produits</h1>
        <a href="{{ route('produits.create') }}" class="btn btn-primary">+ Ajouter</a>
    </div>

    <div class="overflow-x-auto">
        <table class="table table-zebra w-full bg-base-100 shadow rounded">
            <thead class="bg-base-200">
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produits as $produit)
                    <tr>
                        <td>{{ $produit->nom }}</td>
                        <td>{{ number_format($produit->prix, 2) }} €</td>
                        <td>{{ $produit->stock }}</td>
                        <td class="text-center">
                            <div class="flex gap-2 justify-center">
                                <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" onsubmit="return confirm('Supprimer ce produit ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-error">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-gray-500">Aucun produit disponible.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
