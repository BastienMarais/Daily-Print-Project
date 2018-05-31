# Partie installation de l'application :

## Documentations :
* [Installation](https://bastienmarais.github.io/Daily-Print-Project/install)
* [Utilisateurs](https://bastienmarais.github.io/Daily-Print-Project/users)
* [Reprographie](https://bastienmarais.github.io/Daily-Print-Project/repro)
* [Administrateur](https://bastienmarais.github.io/Daily-Print-Project/admin)

## Pr�-requis :

Pour installer Daily Print il vous faut tout d'abord un serveur web comme Apache et un serveur MySQL.
Nous utilisons Xampp ou lampp qui r�unit ces deux serveurs.

Le site n�cessite PHP 7 et un serveur SMPT pour l'envoi d'emails.


Une fois les �l�ments pr�c�dents install�s, il faut r�cup�rer le d�pot github :
```sh
git clone https://Github.com/BastienMarais/Daily-Print-Project.git
git checkout dev
```

Ensuite aller dans `src/site/conf/conf.php` et param�trer l'application :
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
    
    // Windows ou Linux (�a g�re les s�parateurs de fichiers)
    $VALEUR_os = "Windows";
	
?>
```

Il vous reste juste a initialiser la base de donn�es avec le script `src/bd/init_DB.sql`


Vous pouvez a pr�sent acc�der au site avec comme identifiant :
```
Login : admin@dailyprint
Mdp   : admin
```

Changer imm�diatement le mot de passe admin dans la partie "Param�tres".


L'application est pr�te !