# Site CPPF + panel d'administration

## Prérequis
- Hébergement avec **PHP 8.1 ou plus** (extensions `pdo_sqlite`, `fileinfo`, `mbstring`, activées par défaut chez la plupart des hébergeurs)
- Aucune base de données à créer : SQLite est utilisé (fichier `data/cppf.sqlite`, créé automatiquement)

## Installation
1. Envoyez tout le dossier `cppf-site/` sur votre hébergement (via FTP ou le gestionnaire de fichiers).
2. Vérifiez que les dossiers `data/` et `uploads/` sont **accessibles en écriture** par le serveur (droits 755, ou 775 selon l'hébergeur).
3. Ouvrez `https://votre-site/admin/login.php` : au premier lancement, la page vous demande de **créer le compte administrateur** (mot de passe de 10 caractères minimum).
4. Dans « Coordonnées du site », renseignez le téléphone, le courriel et l'adresse réels.

## Test en local
```
cd cppf-site
php -S localhost:8000
```
Puis ouvrez http://localhost:8000 (site) et http://localhost:8000/admin/login.php (admin).

## Ce que le panel gère
- **Messages** reçus via le formulaire de contact (lus/non lus, réponse par courriel, suppression)
- **Actualités** (créer, modifier, publier/dépublier, supprimer, image) : elles s'affichent sur l'accueil et sur /actualites.php
- **Coordonnées** du site (téléphone, courriel, adresse, Facebook)
- **Mot de passe** de l'administrateur

## Sécurité
- Mots de passe hachés (`password_hash`), sessions protégées, jetons CSRF sur tous les formulaires, requêtes préparées, sorties échappées
- Blocage après 5 échecs de connexion en 15 minutes ; limite de 5 messages par heure et par IP sur le formulaire ; champ anti-robot
- Images : type vérifié (JPG/PNG/WebP), 2 Mo maximum, nom aléatoire
- Les fichiers `.htaccess` (Apache) interdisent l'accès direct à `data/` et `includes/`. **Sur Nginx**, ajoutez des règles `deny all` pour ces deux dossiers, ou placez `data/` hors du dossier public et modifiez `DB_PATH` dans `includes/config.php`.
- Activez HTTPS sur le domaine avant de vous connecter à l'administration.
- Faites des sauvegardes régulières de `data/cppf.sqlite` et du dossier `uploads/`.

## Structure
```
cppf-site/
├── index.php, actualites.php, actualite.php   pages publiques
├── api/contact.php                            réception du formulaire
├── css/style.css, js/main.js                  style et script du site
├── admin/                                     panel d'administration
│   ├── login.php, logout.php, index.php
│   ├── messages.php, actualites.php, actualite-edit.php
│   ├── parametres.php, motdepasse.php
│   ├── _header.php, _footer.php, css/admin.css
├── includes/                                  config, base de données, sécurité (protégé)
├── data/                                      base SQLite (protégé)
└── uploads/                                   images des actualités
```
