<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bienvenue - {{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .btn {
                display: inline-block;
                padding: 12px 24px;
                margin: 5px;
                border-radius: 8px;
                text-decoration: none;
                font-weight: bold;
                text-align: center;
                transition: all 0.3s ease;
            }
            .btn-primary {
                background-color: #3b82f6;
                color: white;
            }
            .btn-primary:hover {
                background-color: #1d4ed8;
            }
            .btn-secondary {
                background-color: #6b7280;
                color: white;
            }
            .btn-secondary:hover {
                background-color: #374151;
            }
        </style>
    </head>
    <body style="font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f9fafb;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <header style="text-align: center; margin-bottom: 40px;">
                <h1 style="color: #1f2937; font-size: 2.5rem; margin-bottom: 20px;">Application de Gestion</h1>
                
                <!-- Navigation pour utilisateurs non connectés -->
                @guest
                    <div style="margin-bottom: 20px;">
                        <a href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>
                        <a href="{{ route('register') }}" class="btn btn-secondary">S'inscrire</a>
                    </div>
                @else
                    <div style="margin-bottom: 20px;">
                        <a href="{{ route('home') }}" class="btn btn-primary">Tableau de bord</a>
                    </div>
                @endguest
            </header>

            <main style="text-align: center;">
                <h2 style="color: #1f2937; font-size: 1.8rem; margin-bottom: 20px;">
                    Bienvenue dans votre système de gestion
                </h2>
                <p style="color: #6b7280; font-size: 1.1rem; margin-bottom: 40px;">
                    Gérez facilement vos clients, produits et commandes en toute simplicité.
                </p>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-bottom: 40px;">
                    <div style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                        <div style="font-size: 3rem; margin-bottom: 15px;">👥</div>
                        <h3 style="color: #1f2937; font-size: 1.3rem; margin-bottom: 10px;">Gestion des Clients</h3>
                        <p style="color: #6b7280;">Organisez et suivez votre base de clients efficacement.</p>
                    </div>
                    
                    <div style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                        <div style="font-size: 3rem; margin-bottom: 15px;">📦</div>
                        <h3 style="color: #1f2937; font-size: 1.3rem; margin-bottom: 10px;">Catalogue Produits</h3>
                        <p style="color: #6b7280;">Maintenez un inventaire complet de vos produits.</p>
                    </div>
                    
                    <div style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                        <div style="font-size: 3rem; margin-bottom: 15px;">🛒</div>
                        <h3 style="color: #1f2937; font-size: 1.3rem; margin-bottom: 10px;">Suivi des Commandes</h3>
                        <p style="color: #6b7280;">Gérez les commandes de vos clients en temps réel.</p>
                    </div>
                </div>

                @guest
                    <div style="background: #eff6ff; padding: 40px; border-radius: 10px; margin-top: 40px;">
                        <h3 style="color: #1f2937; font-size: 1.3rem; margin-bottom: 20px;">Prêt à commencer ?</h3>
                        <div>
                            <a href="{{ route('register') }}" class="btn btn-primary" style="margin-right: 10px;">
                                Créer un compte
                            </a>
                            <a href="{{ route('login') }}" class="btn btn-secondary">
                                Se connecter
                            </a>
                        </div>
                    </div>
                @endguest
            </main>
        </div>
    </body>
</html>
