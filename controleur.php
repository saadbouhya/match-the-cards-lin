<?php
session_start();
	$choix = 0;
	$userName3 = '';
	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/modele.php"; 



	if(isset($_GET['action'])) $choix = 1;
	if(isset($_GET['action2'])) $choix = 2;
	if(isset($_GET['action3'])) $choix = 3;
	$check = 1;
	$userName = ' ';


	switch($choix) {
		case 1: 
			$userName         = $_GET['login'];
			$password         = $_GET['passe'];
			global $userName;
			
			if(verifUserBdd($userName,$password) == FALSE) {
						$check = 0; 
						header("location: login.php");
			}
			else {
				header("location: login.php");
			}
		break;
			
		case 2:
			$userName2         = $_GET['login2'];
			$password2         = $_GET['passe2'];
			
			if(verifUserBdd($userName2,$password2) != FALSE && $check == 1) {
						/****************** initialisation de partie*******************************/
						$sql1 = "SELECT idUser FROM users WHERE userName LIKE '$userName' ";
						$sql2 = "SELECT idUser FROM users WHERE userName LIKE '$userName2' ";
						$id1 = SQLGetChamp($sql1);
						$id2 = SQLGetChamp($sql2);
						echo " the value is " . $GLOBALS['userName'];
						insertPartie($id1, $id2);
						/*************/
						header("location: main/index.html");
			}
		break;

		case 3:
				$userName        = $_GET['userName'];
				$email           = $_GET['email'];
				$password        = $_GET['password'];
				$confirmPassword = $_GET['confirmPassword'];
	
				if ($_GET["password"] === $_GET["confirmPassword"]) {
					insertUser ($userName, $email, $password);
					header("location: login.php");
			 }
				else {
					$_SESSION['message'] = "The two passwords do not match";
				}
	}
	
?>










