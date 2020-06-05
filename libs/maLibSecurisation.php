<?php

include_once "maLibUtils.php";	// Car on utilise la fonction valider()
include_once "modele.php";	// Car on utilise la fonction connecterUtilisateur()

/**
 * @file login.php
 * Fichier contenant des fonctions de vérification de logins
 */

/**
 * Cette fonction vérifie si le login/passe passés en paramètre sont légaux
 * Elle stocke les informations sur la personne dans des variables de session : session_start doit avoir été appelé...
 * Infos à enregistrer : pseudo, idUser, heureConnexion, isAdmin
 * Elle enregistre l'état de la connexion dans une variable de session "connecte" = true
 * L'heure de connexion doit être stockée au format date("H:i:s") 
 * @pre login et passe ne doivent pas être vides
 * @param string $login
 * @param string $password
 * @return false ou true ; un effet de bord est la création de variables de session
 */
function verifUser($login,$password)
{
	// Appelle une fonction de vérification des identifiants de la couche modele 
	// nommée verifUserBdd($login,$passe) ainsi que la fonction isAdmin($idUser)

	// vérifie si le login/passe passés en paramètre sont légaux
	// renvoie faux ou un identifiant 
	// (qui sera un entier strictement positif)

	if ($idUser = verifUserBdd($login,$password)) {
		// OK : on crée les var. de session 
		$_SESSION["pseudo"] = $login; 
		$_SESSION["idUser"] = $idUser; 
		$_SESSION["heureConnexion"] = date("H:i:s"); 
		$_SESSION["isAdmin"] = isAdmin($idUser);
		$_SESSION["connecte"] = true;
		return true; 
	} else return false;
}




/**
 * Fonction à placer au début de chaque page privée
 * Cette fonction redirige vers la page $urlBad en envoyant un message d'erreur 
	et arrête l'interprétation si l'utilisateur n'est pas connecté
 * Elle ne fait rien si l'utilisateur est connecté, et si $urlGood est faux
 * Elle redirige vers urlGood sinon
 */
function securiser($urlBad,$urlGood=false)
{

}

?>
