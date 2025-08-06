@extends('layouts.app')

@section('title', 'Modifier un Client')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-yellow-600 text-center">Modifier le Client</h1>

    @if ($errors->any())
        <div class="alert alert-error mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clients.update', $client->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="form-control">
            <label class="label">
                <span class="label-text">Nom</span>
            </label>
            <input type="text" name="nom" value="{{ old('nom', $client->nom) }}" class="input input-bordered w-full" required>
        </div>

        <div class="form-control">
            <label class="label">
                <span class="label-text">Email</span>
            </label>
            <input type="email" name="email" value="{{ old('email', $client->email) }}" class="input input-bordered w-full" required>
        </div>

        <div class="form-control">
            <label class="label">
                <span class="label-text">Téléphone</span>
            </label>
            <input type="text" name="telephone" value="{{ old('telephone', $client->telephone) }}" class="input input-bordered w-full">
        </div>

        <div class="text-center pt-4">
            <button type="submit" class="btn btn-warning">Mettre à jour</button>
            <a href="{{ route('clients.index') }}" class="btn btn-ghost ml-2">Annuler</a>
        </div>
    </form>
</div>
@endsection
