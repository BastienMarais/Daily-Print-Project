# Partie installation de l'application :

## Documentations :
* [Installation](https://bastienmarais.github.io/Daily-Print-Project/install)
* [Utilisateurs](https://bastienmarais.github.io/Daily-Print-Project/users)
* [Reprographie](https://bastienmarais.github.io/Daily-Print-Project/repro)
* [Administrateur](https://bastienmarais.github.io/Daily-Print-Project/admin)

## Pré-requis :

Pour installer Daily Print il vous faut tout d'abord un serveur web comme Apache et un serveur MySQL.
Nous utilisons Xampp ou lampp qui réunit ces deux serveurs.

Le site nécessite PHP 7 et un serveur SMPT pour l'envoi d'emails.


Une fois les éléments précédents installés, il faut récupérer le dépot github :
```sh
git clone https://Github.com/BastienMarais/Daily-Print-Project.git
git checkout dev
```

Ensuite aller dans `src/site/conf/conf.php` et paramétrer l'application :
```php
<?php

    // Serveur MySQL
    $VALEUR_hote='localhost';
    $VALEUR_port='3306';
    $VALEUR_nom_bd='test';
    $VALEUR_user='root';
    $VALEUR_mot_de_passe='';

    // Url de la racine du site
    $VALEUR_url = "http://localhost/serv/Daily-Print-Project/src/site";
    
    // Email qui servira en faire les notifs etc...
    $VALEUR_email = "admin@dailyprint.xyz" ;
    
    // Path des fichiers du site 
    $VALEUR_files = "M:/git/Daily-Print-Project/src/site/files/";
    
    // Windows ou Linux (ça gère les séparateurs de fichiers)
    $VALEUR_os = "Windows";
	
?>
```

Il vous reste juste a initialiser la base de données avec le script `src/bd/init_DB.sql`


Vous pouvez a présent accéder au site avec comme identifiant :
```
Login : admin@dailyprint.xyz
Mdp   : admin
```

Changer immédiatement le mot de passe admin dans la partie "Paramètres".


L'application est prête !
