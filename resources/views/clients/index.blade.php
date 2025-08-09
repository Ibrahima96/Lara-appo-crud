@extends('layouts.master')

@section('title', 'Liste des Clients')

@section('content')
<div class="max-w-5xl mx-auto mt-10">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-blue-600">Liste des Clients</h1>
        <a href="{{ route('clients.create') }}" class="btn btn-primary">+ Ajouter</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success shadow mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m0 0v6a2 2 0 002 2H7a2 2 0 01-2-2v-6m14 4h-4"></path>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="table table-zebra w-full bg-base-100 rounded shadow">
            <thead class="bg-base-200 text-base-content">
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clients as $client)
                    <tr>
                        <td>{{ $client->nom }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->telephone ?? '—' }}</td>
                        <td class="text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-warning">Modifier</a>

                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Supprimer ce client ?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-error">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-gray-500">Aucun client trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
