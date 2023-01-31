<?php

    session_start();
    include('../includes/dB.php');

    if(empty($_POST["editFName"]) || empty($_POST["editLName"]) || empty($_POST["editEmail"]) || empty($_POST["exampleRadios"])){
        echo "err:Vous devez remplir tout les champs";
        exit;
    }

    if(!filter_var($_POST['editEmail'], FILTER_VALIDATE_EMAIL)){
        echo "err:Email invalide"; // Email invalide
        exit;
    }

    $fName = htmlspecialchars($_POST["editFName"]);
    $lName = htmlspecialchars($_POST["editLName"]);
    $email = htmlspecialchars($_POST["editEmail"]);
    $status = htmlspecialchars($_POST["exampleRadios"]);
    $oldEmail = htmlspecialchars($_POST["oldEmail"]);

    var_dump($fName, $lName, $email, $status, $_POST['oldEmail']);

    if($email == $_POST['oldEmail']){
        $update = 'UPDATE users SET usersFName= :prenom, usersLName= :nom, usersStatus= :statut WHERE usersEmail= :email';
    
        $send = $bdd->prepare($update);
        $send->execute(array(':email'=>$email, ':prenom'=>$fName, ':nom'=>$lName, ':statut'=> $status));
        echo "validated:Informations modifiés avec succès";
        exit;
    }
    
    if($email != $_POST['oldEmail']){
    
        // Si l'email est déjà utilisé : redirection vers le formulaire avec un message
        $q = 'SELECT usersId FROM users WHERE usersEmail = ?';
        $req = $bdd->prepare($q);
        $req->execute([$_POST['editEmail']]);
    
        // récupération de tous les résultats
        $results = $req->fetchAll(); // récupère toutes les lignes de résultats et les met dans un tableau
    
        // Si le tableau de résultats n'est pas vide : redirection vers le formulaire avec un message
        if(count($results) != 0){
            echo "err:Cet email est déjà utilisé.";
            exit;
        }
    
        $update = 'UPDATE users SET usersFName= :prenom, usersLName= :nom, usersEmail= :email, usersStatus= :statut, mailVerif = 0 WHERE usersEmail= :oldEmail';
    
        $send = $bdd->prepare($update);
        $send->execute(array(':oldEmail'=>$oldEmail, ':email'=>$email, ':prenom'=>$fName, ':nom'=>$lName,'email'=>$email, ':statut'=> $status));
        echo "validated:Informations modifiés avec succès";
        exit;
    }