<?php
session_start();

if(isset($_SESSION['email'])){
    include('includes/dB.php');

    $verif = 'UPDATE users SET mailVerif = 1 WHERE (usersEmail = :email)';
    $req = $bdd->prepare($verif);
    $result = $req->execute([
    	'email' => $_SESSION['email']
    ]);


    //$req = $bdd->prepare("INSERT INTO users (mailVerif) VALUES (1)");

    header('location: profil.php');
	exit;
}
?>