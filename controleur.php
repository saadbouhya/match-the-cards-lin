<?php
session_start();
	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/modele.php"; 



	if(isset($_GET['action'])) $choix = 1;
	if(isset($_GET['action2'])) $choix = 2;

	$check = 1;
	$userName = ' ';


	switch($choix) {
		case 1: 
			$userName         = $_GET['userName'];
			$password         = $_GET['passe'];
			$userName2         = $_GET['userName2'];
			$password2         = $_GET['passe2'];
			
			
			if(verifUserBdd($userName,$password) != FALSE) {
				if(verifUserBdd($userName2,$password2) != FALSE) {				
					$sql1 = "SELECT idUser FROM users WHERE userName LIKE '$userName' ";
					$sql2 = "SELECT idUser FROM users WHERE userName LIKE '$userName2' ";
					$id1 = SQLGetChamp($sql1);
					$id2 = SQLGetChamp($sql2);
					insertPartie($id1, $id2);


					header("location: main.html");
				}
			}
			else {
				
				header("location: index.php");
			}
		break;
			
		case 2:
			$userName        = $_GET['userName'];
				$email           = $_GET['email'];
				$password        = $_GET['password'];
				$confirmPassword = $_GET['confirmPassword'];
	
				if ($_GET["password"] === $_GET["confirmPassword"]) {
					insertUser ($userName, $email, $password);
					header("location: index.php");
			 }
				else {
					$_SESSION['message'] = "The two passwords do not match";
				}
		break;

		
	}
	
?>











