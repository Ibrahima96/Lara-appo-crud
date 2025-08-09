<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-4">Bienvenue dans votre application de gestion</h1>
                    <p class="text-lg mb-6">Gérez facilement vos clients, produits et commandes.</p>
                    
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-blue-50 p-6 rounded-lg">
                            <h3 class="text-xl font-semibold mb-2">Clients</h3>
                            <p class="text-gray-600 mb-4">Gérez votre base de clients</p>
                            <a href="{{ route('clients.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Voir les clients
                            </a>
                        </div>
                        
                        <div class="bg-green-50 p-6 rounded-lg">
                            <h3 class="text-xl font-semibold mb-2">Produits</h3>
                            <p class="text-gray-600 mb-4">Gérez votre catalogue de produits</p>
                            <a href="{{ route('produits.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Voir les produits
                            </a>
                        </div>
                        
                        <div class="bg-purple-50 p-6 rounded-lg">
                            <h3 class="text-xl font-semibold mb-2">Commandes</h3>
                            <p class="text-gray-600 mb-4">Gérez les commandes clients</p>
                            <a href="{{ route('commandes.index') }}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                                Voir les commandes
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
