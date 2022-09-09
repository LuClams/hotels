
# Groupe-Hôtelier

Ce projet consiste à créer le site web du groupe hôtelier constitué de 7 établissements. Ce groupe souhaite un posséder un site web avec une page pour chacun de ses établissements. 
Il donnera la possibilité à ses clients de réserver une Suite directement depuis le site web.

## Récupération du Projet

Pour récupérer ce projet 

```bash
  git clone https://github.com/LuClams/hotels.git
```


## Installation

ouvrir le dossier dans votre IDE

```bash 
  composer install

  php bin/console doctrine:database:create

  php bin/console doctrine:migrations:migrate
```
    
## Déploiement en local

Deux options pour lancer le serveur de développement PHP :
- Si vous avez installé Symfony :
```
symfony server:start
```

- Si vous utilisez Xampp, il faut activer le server Apache et MySQL.
Sans oublier de créer votre virtualHost comme ci-dessous par exemple:
```
<VirtualHost *:80>
    ServerName hotels.localhost

    DocumentRoot "C:/xampp/apps/hotels/public"
    DirectoryIndex index.php

    <Directory "C:/xampp/apps/hotels/public">
        Require all granted

        FallbackResource /index.php
    </Directory>
</VirtualHost>
```
```
127.0.0.1	hotels.localhost
```
Accès via http://hotels.localhost/home

S'enregistrer en tant q'admin puis accéder au back office:
```
email: cgianelli@hostel.com
mdp: Cgianelli
```
Une fois connecter, taper http://hotels.localhost/admin
