<?php 

// Si l'email existe et n'est pas vide, alors crée un cookie 'email'
if(isset($_POST['email']) && !empty($_POST['email'])){
	setcookie('email', $_POST['email'], time() + 24 * 60 * 60);
}

// Si l'email ou le mot de passe est vide : redirection vers le formulaire avec un message
if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password2']) || empty($_POST['firstName']) || empty($_POST['lastName'])){
	header('location: inscription.php?message=Vous devez remplir tous les champs.');
	exit;
}

// Si l'email n'est pas valide : redirection vers le formulaire avec un message
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	header('location: inscription.php?message=Email invalide.');
	exit;
}

// Si le mot de passe fait moins de 8 caractères : redirection avec un message
if(strlen($_POST['password']) < 8){
	header('location: inscription.php?message=Le mot de passe doit faire au moins 8 caractères.');
	exit;
}

if($_POST['password'] != $_POST['password2']){
	header('location: inscription.php?message=Veuillez saisir un mot de passe identique pour les 2 champs.');
	exit;
}

if($_POST['statut'] == 'acheteur'){
	$status = 'Acheteur';
}else{
	$status = 'Vendeur';
}


// Si on arrive ici, c'est que toutes les vérifications ont marché

// Connexion à la base de données
include('includes/dB.php'); 

// Si l'email est déjà utilisé : redirection vers le formulaire avec un message
$q = 'SELECT usersId FROM users WHERE usersEmail = ?';
$req = $bdd->prepare($q);
$req->execute([$_POST['email']]);

// récupération de tous les résultats
$results = $req->fetchAll(); // récupère toutes les lignes de résultats et les met dans un tableau

// Si le tableau de résultats n'est pas vide : redirection vers le formulaire avec un message
if(count($results) != 0){
	header('location: inscription.php?message=Cet email est déjà utilisé.');
	exit;
}

$q = 'INSERT INTO users (usersFName, usersLName, usersEmail, usersPwd, usersStatus) VALUES (:firstName, :lastName, :email, :password, :status)';
$req = $bdd->prepare($q);
$result = $req->execute([
				'firstName' => $_POST['firstName'],
				'lastName' => $_POST['lastName'],
				'email' => $_POST['email'],
				'password' => hash('sha512', $_POST['password']),
				'status' => $status
			]);




// $empreinte = hash('sha512', $mdp);
// $salt = 'hdiufyzq!qitèçdkfgdzifg';
// $empreinteSalee = hash('sha512', $salt . $mdp);


if($result){
	// Inscription ok : redirection vers le formulaire de connexion avec un message
	header('location: connexion.php?message=Compte créé avec succès');
	exit;
}
else{
	// Inscription pas ok : redirection vers le formulaire d'inscription' avec un message
	header('location: inscription.php?message=Erreur lors de l\'inscription.');
	exit;
}


?>