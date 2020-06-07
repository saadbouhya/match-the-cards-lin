<?php


// inclure ici la librairie faciliant les requêtes SQL
include_once("maLibSQL.pdo.php");



function verifUserBdd($login,$passe)
{
	// Vérifie l'identité d'un utilisateur 
	// dont les identifiants sont passes en paramètre
	// renvoie faux si user inconnu
	// renvoie l'id de l'utilisateur si succès

	// On utilise SQLGetChamp
	// si on avait besoin de plus d'un champ
	// on aurait du utiliser SQLSelect

	$SQL ="SELECT idUser FROM users WHERE userName='$login' AND password='$passe'"; 

	return SQLGetChamp($SQL);
}

function isAdmin($idUser)
{
	// vérifie si l'utilisateur est un administrateur
	$SQL = "SELECT admin FROM users WHERE id='$idUser'";
	return SQLGetChamp($SQL);
}

function getProduits() {
	// Liste les produits de la bdd
}

function addProduit($idCommande, $idProduit, $quantite) {
	// Ajoute un produit à une commande
}

function delProduit($idCommande, $idProduit) {
	// Supprime un produit d'une commande
}

function creerCommande() {
	// Crée une nouvelle commande et renvoie son id
}

function getCommandes($etat) {
	// Affiche toutes les commandes dont l'état correspond à l'état passé en paramètre
}

function getCommandesUser($idUser) {
	// Affiche toutes les commandes de l'utilisateur passé en paramètre
}

function validerCommande($idCommande) {
	// Valide une commande
}

function finaliserCommande($idCommande) {
	// Finalise une commande
}


// A compléter...




?>
