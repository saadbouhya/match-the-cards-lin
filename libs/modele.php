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

/******** Pour inserer une nouvelle partie dans le tableau */
function insertPartie($id1,$id2) {
	$sql = "INSERT INTO parties (idUser1,idUser2) VALUES ($id1,$id2)";
	SQLInsert($sql);
} 
/******** Pour inserer un nouveau utilisateur  */
function insertUser ($userName, $email, $password) {
	$sql = "INSERT INTO users (userName, email, password) VALUES('$userName', '$email', '$password')";
	SQLInsert($sql);
}




?>
