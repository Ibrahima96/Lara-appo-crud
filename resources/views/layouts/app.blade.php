<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head data-theme="cupcake">
    <meta charset="UTF-8">
    <title>@yield('title', 'Laravel Lego Style')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">

    <div class="navbar bg-base-200 shadow">
        <div class="flex-1 px-2 text-lg font-semibold">
            Lara Appo
        </div>
        <div class="flex-none">
            <a href="{{ route('clients.index') }}" class="btn btn-sm btn-outline">Clients</a>
            <!-- Tu ajouteras Produits & Commandes ici plus tard -->
            <a href="{{ route('produits.index') }}" class="btn btn-sm btn-outline">Produit</a>
        </div>
    </div>

    <div class="p-6">
        @yield('content')
    </div>

</body>
</html>
