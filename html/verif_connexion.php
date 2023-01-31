<?php
    // Si l'email existe et n'est pas vide, alors crée un cookie 'email'
	if(isset($_POST['email']) && !empty($_POST['email'])){
		setcookie('email', $_POST['email'], time() + 24 * 60 * 60);
	}

	// Si l'email ou le mot de passe est vide : redirection vers le formulaire avec un message
	if(empty($_POST['email']) || empty($_POST['password'])){
		header('location: connexion.php?message=Vous devez remplir les 2 champs');  // Vous devez remplir les 2 champs
		exit;
	}

	// Si l'email n'est pas valide : redirection vers le formulaire avec un message
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		header('location: connexion.php?message=Email invalide'); // Email invalide
		exit;
	}


	// Si les identifiants sont incorrects : redirection vers le formulaire avec un message
	// Connexion à la base de données
	include('includes/dB.php'); 


	$q = 'SELECT usersId FROM users WHERE usersEmail = :email AND usersPwd = :password';
	$req = $bdd->prepare($q);
	$req->execute([
					'email' => $_POST['email'],
					'password' => hash('sha512', $_POST['password'])
				]);
	$results = $req->fetchAll(); 

	if(count($results) == 0){
		header('location: connexion.php?message=Identifiants incorrects'); // Identifiants incorrects
		exit;
	}


	// Si on arrive ici, c'est que toutes les vérifications ont fonctionné
	// Ouverture d'une session utilisateur et enregistrement d'un paramètre email
	session_start();
	$_SESSION['email'] = $_POST['email'];

	// Redirection vers la page d'accueil
	header('location: index.php');
	exit;
?>
