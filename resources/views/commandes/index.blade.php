@extends('layouts.app')

@section('title', 'Commandes')

@section('content')
<div class="max-w-6xl mx-auto mt-10">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold text-blue-600">Commandes</h1>
        <a href="{{ route('commandes.create') }}" class="btn btn-primary">+ Ajouter</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto">
        <table class="table table-zebra w-full bg-base-100 rounded shadow">
            <thead class="bg-base-200">
                <tr>
                    <th>Client</th>
                    <th>Date</th>
                    <th>Total (€)</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($commandes as $commande)
                    <tr>
                        <td>{{ $commande->client->nom }}</td>
                        <td>{{ $commande->date_commande }}</td>
                        <td>{{ number_format($commande->total, 2) }}</td>
                        <td class="text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('commandes.show', $commande->id) }}" class="btn btn-sm btn-info">Voir</a>
                                <a href="{{ route('commandes.edit', $commande->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST" onsubmit="return confirm('Supprimer cette commande ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-error" type="submit">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-gray-500">Aucune commande trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
