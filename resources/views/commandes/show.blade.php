@extends('layouts.app')

@section('title', 'Détails de la commande')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
    <h1 class="text-2xl font-bold text-blue-600 mb-6 text-center">Détails de la commande</h1>

    <div class="mb-4 space-y-1">
        <p><strong>Client :</strong> {{ $commande->client->nom }}</p>
        <p><strong>Date :</strong> {{ $commande->date_commande }}</p>
        <p><strong>Total :</strong> {{ number_format($commande->total, 2) }} €</p>
    </div>

    <h2 class="text-xl font-semibold mb-2 mt-6">Produits commandés</h2>
    <div class="overflow-x-auto">
        <table class="table w-full table-zebra bg-base-100 rounded">
            <thead class="bg-base-200">
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Sous-total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commande->produits as $produit)
                    <tr>
                        <td>{{ $produit->nom }}</td>
                        <td>{{ $produit->pivot->quantite }}</td>
                        <td>{{ number_format($produit->prix, 2) }} €</td>
                        <td>{{ number_format($produit->prix * $produit->pivot->quantite, 2) }} €</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="text-center mt-6">
        <a href="{{ route('commandes.index') }}" class="btn btn-ghost">⬅ Retour</a>
    </div>
</div>
@endsection
