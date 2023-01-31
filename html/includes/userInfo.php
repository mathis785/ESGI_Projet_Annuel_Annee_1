<?php

include('includes/dB.php');
$userInfSelect = 'SELECT usersFName, usersLName, usersEmail, usersStatus, usersRole, mailVerif, Numero_rue, Nom_rue, Ville, Code_Postal, Numero FROM users WHERE usersEmail = :email';
$req = $bdd->prepare($userInfSelect);
$req->execute([
        'email' => $_SESSION['email']
]);
    $userInfo = $req->fetchAll(); 

    $role = $userInfo[0]['usersRole'];

    $logReq = $bdd->prepare('SELECT usersEmail,idLog, pageName, dateLog FROM log,users WHERE idUser = usersId ORDER BY dateLog DESC LIMIT 100');
    $logReq->execute();
    $log = $logReq->fetchAll(); 

    $ConReq = $bdd->prepare('SELECT COUNT(idLog) FROM log');
    $ConReq->execute();
    $Connexion = $ConReq->fetchAll();

    $ConCurReq = $bdd->prepare('SELECT COUNT(idLog) FROM log WHERE DATE(dateLog) = CURDATE()');
    $ConCurReq->execute();
    $currentConnexion = $ConCurReq->fetchAll(); 

    $Con30Req = $bdd->prepare('SELECT COUNT(idLog) FROM log WHERE MONTH(dateLog) = ?');
    $Con30Req->execute(array(date('m')));
    $connexion30 = $Con30Req->fetchAll(); 

    $userSelect = 'SELECT usersId, usersFName, usersLName, usersEmail, usersStatus FROM users WHERE usersRole = 1';
    $userReq = $bdd->prepare($userSelect);
    $userReq->execute();

    $user = $userReq->fetchAll(); 

    $idReq = $bdd->prepare('SELECT usersId FROM users WHERE usersEmail = :email LIMIT 1');
    $idReq->execute([
        'email' => $_SESSION['email']
    ]); 
    $idUser = $idReq->fetchAll(); 
?>
