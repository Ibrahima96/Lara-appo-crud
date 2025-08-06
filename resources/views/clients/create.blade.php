@extends('layouts.app')

@section('title', 'Ajouter un Client')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-base-100 p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-blue-600 text-center">Ajouter un Client</h1>

    <form action="{{ route('clients.store') }}" method="POST" class="space-y-4">
        @csrf

        <div class="form-control">
            <label class="label">
                <span class="label-text">Nom</span>
            </label>
            <input type="text" name="nom" class="input input-bordered w-full" required>
        </div>

        <div class="form-control">
            <label class="label">
                <span class="label-text">Email</span>
            </label>
            <input type="email" name="email" class="input input-bordered w-full" required>
        </div>

        <div class="form-control">
            <label class="label">
                <span class="label-text">Téléphone</span>
            </label>
            <input type="text" name="telephone" class="input input-bordered w-full">
        </div>

        <div class="text-center pt-4">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('clients.index') }}" class="btn btn-ghost ml-2">Annuler</a>
        </div>
    </form>
</div>
@endsection
