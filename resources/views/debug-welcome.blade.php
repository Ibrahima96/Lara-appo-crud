<!DOCTYPE html>
<html>
<head>
    <title>Debug - Page d'accueil</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .debug { background: #f0f0f0; padding: 10px; margin: 10px 0; border-radius: 5px; }
        .btn { padding: 10px 20px; margin: 5px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; }
        .btn:hover { background: #0056b3; }
    </style>
</head>
<body>
    <h1>Debug - Page d'accueil</h1>
    
    <div class="debug">
        <h3>État de l'authentification :</h3>
        @auth
            <p>✅ Utilisateur connecté : {{ Auth::user()->name }} ({{ Auth::user()->email }})</p>
        @else
            <p>❌ Utilisateur non connecté</p>
        @endauth
    </div>

    <div class="debug">
        <h3>Routes disponibles :</h3>
        <p>Route 'login' existe : {{ Route::has('login') ? '✅ Oui' : '❌ Non' }}</p>
        <p>Route 'register' existe : {{ Route::has('register') ? '✅ Oui' : '❌ Non' }}</p>
        <p>Route 'home' existe : {{ Route::has('home') ? '✅ Oui' : '❌ Non' }}</p>
    </div>

    <div class="debug">
        <h3>Liens de navigation :</h3>
        @guest
            <p>Section @guest active :</p>
            <a href="{{ route('login') }}" class="btn">Se connecter</a>
            <a href="{{ route('register') }}" class="btn">S'inscrire</a>
        @else
            <p>Section @auth active :</p>
            <a href="{{ route('home') }}" class="btn">Tableau de bord</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn" style="background: #dc3545;">Se déconnecter</button>
            </form>
        @endguest
    </div>

    <div class="debug">
        <h3>URLs générées :</h3>
        <p>Login : <a href="{{ route('login') }}">{{ route('login') }}</a></p>
        <p>Register : <a href="{{ route('register') }}">{{ route('register') }}</a></p>
    </div>
</body>
</html>
