<?php

$userIdReq = $bdd->prepare('SELECT usersId FROM users WHERE usersEmail = ?');
$userIdReq->execute(array($_SESSION["email"]));
$userId = $userIdReq->fetchAll();


$last_user_log = $bdd->prepare('SELECT pageName FROM log WHERE idUser = ? ORDER BY dateLog DESC LIMIT 1');
$last_user_log->execute(array($userId[0]['usersId']));
$last_user_activity = $last_user_log->fetchAll();

if($userId[0]['usersId'] !== NULL){

    if($last_user_activity[0]['pageName'] != $actual_page){
        $add_user_log = $bdd->prepare('INSERT INTO log (pageName,idUser) VALUES (?,?)');
        $add_user_log->execute(array($actual_page,$userId[0]['usersId'])); 
    }

}


    ?>