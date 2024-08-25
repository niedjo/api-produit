# REST API de Gestion des Produits

Cette API REST en PHP permet de gérer un ensemble de produits via des opérations CRUD (Create, Read, Update, Delete). Elle est conçue pour interagir avec une base de données SQL, offrant une interface simple et sécurisée pour l'ajout, la consultation, la modification et la suppression de produits.

## 📝 Description

L'API permet de gérer des produits, avec les fonctionnalités suivantes :
- **Créer un produit** : Ajout d'un nouveau produit dans la base de données.
- **Lire les produits** : Récupération de la liste des produits ou d'un produit spécifique.
- **Mettre à jour un produit** : Modification des informations d'un produit existant.
- **Supprimer un produit** : Suppression d'un produit de la base de données.

## 🛠️ Technologies Utilisées

- **PHP** : Pour l'implémentation de la logique serveur.
- **SQL (MySQL)** : Pour la gestion de la base de données, le stockage et la manipulation des données.
- **PDO** : Pour l'interaction sécurisée avec la base de données via des requêtes préparées.

## 📦 Prérequis

Pour utiliser cette API, vous devez avoir :
- **Un serveur web** (Apache, Nginx, etc.) avec PHP installé.
- **Une base de données MySQL** ou tout autre système de gestion de base de données compatible avec SQL.
- **Postman** ou tout autre client API pour tester les endpoints.

## 🔧 Installation et Configuration

1. **Cloner le projet** :
   ```bash
   git clone https://github.com/niedjo/api-produit.git
   ```

2. **Configuration de la base de données** :
   - Créez une base de données MySQL.
   - Exécutez le script SQL fourni (`database.sql`) pour créer la table `produits` et la table associée `categories`.
   - Mettez à jour les informations de connexion à la base de données dans le fichier `config/database.php`.

3. **Démarrage du serveur** :
   - Placez les fichiers du projet dans le répertoire de votre serveur web (par exemple, `htdocs` pour XAMPP).
   - Accédez au projet via votre navigateur ou utilisez Postman pour interagir avec l'API.

## 📑 Endpoints de l'API

L'API offre les endpoints suivants :

### 1. Créer un produit
- **URL** : `/produits/create`
- **Méthode** : `POST`
- **Paramètres attendus** :
  - `nom` (string) : Nom du produit.
  - `description` (string) : Description du produit.
  - `prix` (float) : Prix du produit.
  - `categories_id` (int) : ID de la catégorie associée au produit.
  - `created_at` (datetime) : Date et heure de création du produit.

### 2. Lire tous les produits
- **URL** : `/produits/read`
- **Méthode** : `GET`
- **Description** : Récupère la liste de tous les produits avec leurs détails.

### 3. Lire un produit spécifique
- **URL** : `/produits/read_one?id={id}`
- **Méthode** : `GET`
- **Paramètres** :
  - `id` (int) : ID du produit à lire.
- **Description** : Récupère les détails d'un produit spécifique.

### 4. Mettre à jour un produit
- **URL** : `/produits/update`
- **Méthode** : `PUT`
- **Paramètres attendus** :
  - `id` (int) : ID du produit à mettre à jour.
  - `nom` (string) : Nouveau nom du produit.
  - `description` (string) : Nouvelle description du produit.
  - `prix` (float) : Nouveau prix du produit.
  - `categories_id` (int) : Nouvel ID de la catégorie associée au produit.

### 5. Supprimer un produit
- **URL** : `/produits/delete`
- **Méthode** : `DELETE`
- **Paramètres attendus** :
  - `id` (int) : ID du produit à supprimer.

## ⚙️ Fonctionnement Interne

Le modèle `Produit` encapsule toutes les opérations CRUD, en interagissant directement avec la base de données via PDO pour sécuriser les données contre les injections SQL. Voici les principales méthodes :

- **`creer()`** : Insère un nouveau produit dans la base de données.
- **`lire()`** : Récupère tous les produits en incluant les noms de leurs catégories.
- **`lireUn()`** : Récupère un produit spécifique en fonction de son ID.
- **`modifier()`** : Met à jour les informations d'un produit.
- **`supprimer()`** : Supprime un produit en fonction de son ID.

## 📜 Licence

Ce projet est sous licence MIT. Vous êtes libre de l'utiliser, le modifier et le distribuer selon les termes de cette licence.

## 📧 Contact

Pour toute question, suggestion ou retour, veuillez contacter [niedjokuitche@gmail.com](mailto:niedjokuitche@gmail.com).
