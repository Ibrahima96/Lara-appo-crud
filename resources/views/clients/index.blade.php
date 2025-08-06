@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-600">Liste des Clients</h1>

    <a href="{{ route('clients.create') }}" class="mb-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        + Ajouter un client
    </a>
        @if (session('success'))
            <div class="bg-green-600 p-3 rounded-sm mb-4 text-gray-100 font-extrabold text-sm">{{ session('success') }}</div>
        @endif
    <table class="min-w-full bg-white rounded shadow">
        <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="py-2 px-4 text-left">Nom</th>
                <th class="py-2 px-4 text-left">Email</th>
                <th class="py-2 px-4 text-left">Téléphone</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr class="border-t">
                    <td class="py-2 px-4">{{ $client->nom }}</td>
                    <td class="py-2 px-4">{{ $client->email }}</td>
                    <td class="py-2 px-4">{{ $client->telephone }}</td>
                    <td class="py-2 px-4 text-center space-x-2">
                        <a href="{{ route('clients.edit', $client->id) }}" class="text-yellow-500 hover:underline ">Modifier</a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
