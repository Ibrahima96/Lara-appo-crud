
# 🛒 Lara-appo - Système de Gestion de Boutique

## 📖 Qu'est-ce que Lara-appo ?

Lara-appo est une application web qui aide les commerçants à gérer leur boutique. C'est comme un carnet numérique pour organiser les produits et les clients !

## 🎯 À quoi ça sert ?

- **Gérer les produits** : Ajouter, modifier, supprimer des produits avec leur prix et stock
- **Gérer les clients** : Garder une liste de tous les clients avec leurs coordonnées
- **Interface simple** : Facile à utiliser, même pour les débutants

## 🏗️ Comment c'est fait ?

### Technologies utilisées :
- **Laravel** : Le squelette de l'application (comme les fondations d'une maison)
- **SQLite** : La base de données (comme un grand classeur pour ranger les informations)
- **Tailwind CSS** : Pour faire joli (comme la peinture et la décoration)
- **DaisyUI** : Composants tout prêts (comme des meubles déjà assemblés)

### Structure de la base de données :

#### 📦 Table "produits" :
- `id` : Numéro unique du produit
- `nom` : Nom du produit
- `prix` : Prix en euros
- `description` : Description du produit
- `stock` : Nombre d'articles disponibles
- `created_at` et `updated_at` : Dates de création et modification

#### 👥 Table "clients" :
- `id` : Numéro unique du client
- `nom` : Nom du client
- `email` : Adresse email
- `telephone` : Numéro de téléphone
- `created_at` et `updated_at` : Dates de création et modification

## 🚀 Comment installer et utiliser ?

### 1. Installation :
```bash
# Cloner le projet
git clone https://github.com/Ibrahima96/Lara-appo-crud.git

# Installer les dépendances PHP et Installer les dépendances JavaScript
composer run dev

# Créer la base de données
php artisan migrate

# Démarrer le serveur
php artisan serve
```

### 2. Utilisation :
1. Ouvrir votre navigateur
2. Aller sur `http://localhost:8000`
3. Commencer à ajouter vos produits et clients !

## 📋 Fonctionnalités actuelles :

### ✅ Fait :
- ✅ Ajouter un produit
- ✅ Modifier un produit
- ✅ Supprimer un produit
- ✅ Voir la liste des produits
- ✅ Ajouter un client
- ✅ Modifier un client
- ✅ Supprimer un client
- ✅ Voir la liste des clients

### 🔄 À faire :
- ❌ Système de commandes (table "commandes")
- ❌ Relation entre clients et commandes
- ❌ Relation entre produits et commandes
- ❌ Calcul automatique des totaux
- ❌ Historique des commandes

## 🎨 Interface utilisateur :

L'application utilise DaisyUI pour une interface moderne et intuitive :
- Boutons colorés et attrayants
- Formulaires clairs et simples
- Navigation facile entre les pages
- Design responsive (fonctionne sur mobile)

## 🔧 Structure du projet :

```
Lara-appo/
├── app/
│   ├── Models/          # Modèles (Produit, Client)
│   └── Http/Controllers/ # Contrôleurs
├── database/
│   └── migrations/      # Structure de la base de données
├── resources/
│   └── views/          # Pages web
├── routes/
│   └── web.php         # Routes de l'application
└── public/             # Fichiers publics
```

## 🎯 Prochaines étapes :

1. **Créer la table "commandes"** pour enregistrer les achats
2. **Établir les relations** entre clients, produits et commandes
3. **Ajouter un panier** pour les achats
4. **Créer des rapports** de vente
5. **Ajouter des images** aux produits

## 🤝 Contribution :

Bicomaru Shogunai 📚

---

**💡 Conseil** : Cette application est parfaite pour apprendre Laravel et la gestion de base de données !
=======

>>>>>>> a29aa91dad1dbae375345098fdb90df7150d1ddd
