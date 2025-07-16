# Laravel 12 JWT Authentication API

<p align="center">
<img src="https://img.shields.io/badge/Laravel-12.x-red.svg" alt="Laravel Version">
<img src="https://img.shields.io/badge/PHP-8.2+-blue.svg" alt="PHP Version">
<img src="https://img.shields.io/badge/JWT-Auth-green.svg" alt="JWT Auth">
<img src="https://img.shields.io/badge/license-MIT-green.svg" alt="License">
</p>

## 📋 À propos

Ce projet est une API d'authentification robuste construite avec **Laravel 12** utilisant **JWT (JSON Web Tokens)** pour l'authentification sécurisée. Il fournit un système complet d'inscription, connexion, déconnexion et gestion des tokens avec des middlewares personnalisés pour la protection des routes.

## ✨ Fonctionnalités

- 🔐 **Authentification JWT complète** avec php-open-source-saver/jwt-auth
- 👤 **Inscription et connexion des utilisateurs**
- 🔄 **Rafraîchissement automatique des tokens**
- 🚪 **Déconnexion sécurisée avec invalidation des tokens**
- 🛡️ **Middlewares personnalisés** pour la protection des routes
- ✅ **Validation robuste des données**
- 🚦 **Gestion d'erreurs appropriée**
- 📱 **Réponses JSON structurées**

## 🛠️ Technologies utilisées

- **Laravel 12.x** - Framework PHP
- **PHP 8.2+** - Langage de programmation
- **JWT Auth** - Authentification par tokens
- **MySQL** - Base de données (configurable)
- **Composer** - Gestionnaire de dépendances PHP

## 📦 Installation

### Prérequis

- PHP 8.2 ou supérieur
- Composer
- MySQL ou autre base de données supportée
- Extension PHP : OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON

### Étapes d'installation

1. **Cloner le repository**
```bash
git clone https://github.com/anwar-bouchehboun/Auth_Jwt_Laravel12.git
cd Auth_Jwt_Laravel12
```

2. **Installer les dépendances**
```bash
composer install
```

3. **Configurer l'environnement**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configurer la base de données**
Éditer le fichier `.env` avec vos paramètres de base de données :
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_jwt
DB_USERNAME=votre_username
DB_PASSWORD=votre_password
```

5. **Générer la clé JWT**
```bash
php artisan jwt:secret
```

6. **Exécuter les migrations**
```bash
php artisan migrate
```

7. **Lancer le serveur de développement**
```bash
php artisan serve
```

L'API sera accessible à l'adresse : `http://localhost:8000`

## 🚀 Utilisation de l'API

### Endpoints disponibles

#### Routes publiques

| Méthode | Endpoint | Description |
|---------|----------|-------------|
| POST | `/api/auth/register` | Inscription d'un nouvel utilisateur |
| POST | `/api/auth/login` | Connexion utilisateur |

#### Routes protégées (JWT requis)

| Méthode | Endpoint | Description |
|---------|----------|-------------|
| GET | `/api/auth/me` | Obtenir les informations de l'utilisateur connecté |
| POST | `/api/auth/logout` | Déconnexion et invalidation du token |
| POST | `/api/auth/refresh` | Rafraîchir le token JWT |

### 📋 Exemples d'utilisation

#### 1. Inscription
```bash
POST /api/auth/register
Content-Type: application/json

{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "motdepasse123"
}
```

**Réponse :**
```json
{
    "status": "success",
    "message": "User registered successfully",
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "created_at": "2025-01-16T10:30:00.000000Z"
    },
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...",
    "token_type": "bearer",
    "expires_in": 3600
}
```

#### 2. Connexion
```bash
POST /api/auth/login
Content-Type: application/json

{
    "email": "john@example.com",
    "password": "motdepasse123"
}
```

#### 3. Accès aux routes protégées
```bash
GET /api/auth/me
Authorization: Bearer {votre_token_jwt}
```

#### 4. Rafraîchir le token
```bash
POST /api/auth/refresh
Authorization: Bearer {votre_token_jwt}
```

#### 5. Déconnexion
```bash
POST /api/auth/logout
Authorization: Bearer {votre_token_jwt}
```

## ⚙️ Configuration

### Configuration JWT

Le fichier `config/jwt.php` contient toutes les configurations JWT. Paramètres principaux :

- **TTL (Time To Live)** : Durée de vie du token (par défaut : 60 minutes)
- **Refresh TTL** : Durée pendant laquelle un token peut être rafraîchi
- **Algorithme** : Algorithme de chiffrement utilisé (HS256 par défaut)

### Variables d'environnement importantes

```env
JWT_SECRET=votre_cle_secrete_jwt
JWT_TTL=60
JWT_REFRESH_TTL=20160
AUTH_GUARD=api
```

## 🔒 Sécurité

- ✅ Validation stricte des données d'entrée
- ✅ Hashage sécurisé des mots de passe avec bcrypt
- ✅ Protection contre les attaques CSRF pour les routes API
- ✅ Expiration automatique des tokens JWT
- ✅ Invalidation des tokens lors de la déconnexion
- ✅ Middleware de protection contre l'accès des utilisateurs déjà authentifiés

## 🧪 Tests

Exécuter les tests :
```bash
php artisan test
```

## 📁 Structure du projet

```
app/
├── Http/
│   ├── Controllers/
│   │   └── AuthController.php
│   └── Middleware/
│       ├── JwtMiddleware.php
│       └── PreventAuthenticatedAccess.php
├── Models/
│   └── User.php
config/
├── auth.php
├── jwt.php
routes/
└── api.php
```

## 🤝 Contribution

Les contributions sont les bienvenues ! Pour contribuer :

1. Fork le projet
2. Créez une branche pour votre fonctionnalité (`git checkout -b feature/AmazingFeature`)
3. Committez vos changements (`git commit -m 'Add some AmazingFeature'`)
4. Push vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrez une Pull Request

## 📝 License

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

## 👨‍💻 Auteur

**Anwar Bouchehboun**
- GitHub: [@anwar-bouchehboun](https://github.com/anwar-bouchehboun)

## 🆘 Support

Si vous rencontrez des problèmes ou avez des questions, n'hésitez pas à :
- Ouvrir une [issue](https://github.com/anwar-bouchehboun/Auth_Jwt_Laravel12/issues)
- Contacter l'auteur

---

⭐ N'oubliez pas de donner une étoile au projet si vous l'avez trouvé utile !
