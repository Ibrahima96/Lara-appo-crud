@extends('layouts.app')

@section('title', 'Modifier la Commande')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-yellow-600 text-center">Modifier la Commande</h1>

    <form action="{{ route('commandes.update', $commande->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="form-control">
            <label class="label"><span class="label-text">Client</span></label>
            <select name="client_id" class="select select-bordered w-full" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $commande->client_id ? 'selected' : '' }}>
                        {{ $client->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-control">
            <label class="label"><span class="label-text">Date de commande</span></label>
            <input type="date" name="date_commande" value="{{ $commande->date_commande }}" class="input input-bordered w-full" required>
        </div>

        <div class="form-control">
            <label class="label"><span class="label-text">Produits</span></label>
            <div class="grid gap-4">
                @foreach($produits as $produit)
                    @php
                        $pivot = $commande->produits->firstWhere('id', $produit->id);
                    @endphp
                    <div class="flex items-center gap-4">
                        <input type="checkbox" name="produits[{{ $produit->id }}][checked]" value="1"
                               {{ $pivot ? 'checked' : '' }} class="checkbox">
                        <span class="flex-1">{{ $produit->nom }} ({{ number_format($produit->prix, 2) }} €)</span>
                        <input type="number" name="produits[{{ $produit->id }}][quantite]"
                               value="{{ $pivot ? $pivot->pivot->quantite : 1 }}"
                               min="1" class="input input-bordered w-24">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="text-center pt-4">
            <button type="submit" class="btn btn-warning">Mettre à jour</button>
            <a href="{{ route('commandes.index') }}" class="btn btn-ghost ml-2">Annuler</a>
        </div>
    </form>
</div>
@endsection
