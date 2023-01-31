<?php
session_start();
include 'includes/userInfo.php';

if(empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['email']) || empty($_POST['numero']) || empty($_POST['ville']) || empty($_POST['numeroRue']) || empty($_POST['nomRue']) || empty($_POST['codePostal'])){
    header('location: editProfil.php?message=Vous devez remplir tous les champs');
    exit;
}

// Si l'email n'est pas valide : redirection vers le formulaire avec un message
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    header('location: editProfil.php?message=Email invalide'); // Email invalide
    exit;
}

$prenom = htmlspecialchars($_POST['prenom']);
$nom = htmlspecialchars($_POST['nom']);
$email = htmlspecialchars($_POST['email']);
$numero = htmlspecialchars($_POST['numero']);
$ville = htmlspecialchars($_POST['ville']);
$numeroRue = htmlspecialchars($_POST['numeroRue']);
$nomRue = htmlspecialchars($_POST['nomRue']);
$codePostal = htmlspecialchars($_POST['codePostal']);



if($_POST['email'] == $_SESSION['email']){
    $update = 'UPDATE users SET usersFName= :prenom, usersLName= :nom, Numero_rue= :numeroRue, Nom_rue= :nomRue, Ville= :ville, Code_Postal= :codePostal, Numero= :numero WHERE usersId= :id';

    $send = $bdd->prepare($update);
    $send->execute(array(':id'=>$idUser[0]['usersId'], ':prenom'=>$prenom, ':nom'=>$nom, ':numeroRue'=>$numeroRue, ':nomRue'=>$nomRue, ':ville'=>$ville, ':codePostal'=>$codePostal, ':numero'=>$numero));
    header('location: profil.php?message=Informations modifiés avec succès');
    exit;
}

if($_POST['email'] != $_SESSION['email']){

    // Si l'email est déjà utilisé : redirection vers le formulaire avec un message
    $q = 'SELECT usersId FROM users WHERE usersEmail = ?';
    $req = $bdd->prepare($q);
    $req->execute([$_POST['email']]);

    // récupération de tous les résultats
    $results = $req->fetchAll(); // récupère toutes les lignes de résultats et les met dans un tableau

    // Si le tableau de résultats n'est pas vide : redirection vers le formulaire avec un message
    if(count($results) != 0){
        header('location: verifProfil.php?message=Cet email est déjà utilisé.');
        exit;
    }

    $update = 'UPDATE users SET usersFName= :prenom, usersLName= :nom, usersEmail= :email, mailVerif = 0, Numero_rue= :numeroRue, Nom_rue= :nomRue, Ville= :ville, Code_Postal= :codePostal, Numero= :numero WHERE usersId= :id';

    $send = $bdd->prepare($update);
    $send->execute(array(':id'=>$idUser[0]['usersId'], ':prenom'=>$prenom, ':nom'=>$nom,'email'=>$email, ':numeroRue'=>$numeroRue, ':nomRue'=>$nomRue, ':ville'=>$ville, ':codePostal'=>$codePostal, ':numero'=>$numero));
    $_SESSION['email'] = $email;
    header('location: profil.php?message=Informations modifiés avec succès');
    exit;
}


?>