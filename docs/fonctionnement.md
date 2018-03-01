# Page : index.php

## Partie connexion :

```
* On tape un email et mdp
* On clique sur le bouton "Connexion"
* On vérifie si l'adresse email existe dans la base de données.
	* Si oui :
		* On vérifie si le mdp correspond bien à l'email
		* Si oui :
			* On regarde si la case "Se souvenir de moi" est cochée
			* Si oui :
				* On ouvre une session
				* On redirige vers accueil.php
			* Sinon :
				* On redirige vers accueil.php
		* Sinon :
			* On renvoi un message tel que "Le mdp est incorrect"
	* Sinon :
		* On renvoi un message tel que "Email incorrect"
```	
	
## Partie mot de passe oublié :

```* On clique sur le lien "Mot de passe oublié"
* On redirige vers oubli.php
```

## Partie création d'un compte :

```
* On clique sur le bouton "Créer un compte"
* On redirige vers inscription.php
```

# Page : oubli.php

## Partie changement de mdp :

```
* On tape notre email
* On clique sur le bouton "Envoyer"
* On vérifie si l'adresse email existe dans la base de données
	* Si oui :
		* On génère un mdp aléatoire
		* On met à jour la base de données
		* On envoi un email avec le nouveau mdp à l'adresse donnée
		* On envoi un message tel que "Nouveau mdp envoyé à $email"
	* Sinon :
		* On renvoi un message tel que "Email inconnu"
```

## Partie retour :

```
* On clique sur le bouton "Retour"
* On redirige vers index.php
```

# Page : inscription.php

## Partie créer un compte :

```
* On remplit chacuns des champs
* On clique sur le bouton "S'inscrire"
* On vérifie si l'email entré existe (ou non) dans la base de données
	* Si oui :
		* On vérifie si les deux champs mdp sont identiques
			* Si oui :
				* On insert le tout dans la table USER_TMP de la base TMP
				* On envoi un message tel que "Votre compte est en attente d'une validation de l'admin"
			* Sinon :
				* On envoi un message tel que "Vous avez entré deux mdp différents"
	* Sinon :
		* On envoi un message tel que "Cette adresse est déjà utilisée, si vous avez oublié votre mdp alors allez vers lien : oubli.php"
```

## Partie retour :

```
* On clique sur le bouton "Retour"
* On redirige vers index.php
```

