<?php
include '../includes/dB.php';



    if(isset($_GET['id'])){
        $verifReq = $bdd->prepare('SELECT COUNT(usersId) AS verif FROM users WHERE usersId = ?');
        $verifReq->execute(array($_GET['id']));
        $verif = $verifReq->fetch(); 

        if($verif['verif'] == 1){

            $q = "SET foreign_key_checks = 0";
            $req = $bdd->prepare($q);
            $result = $req->execute();

            $q = "DELETE FROM users WHERE usersId = ?";
            $req = $bdd->prepare($q);
            $result = $req->execute(array($_GET['id']));

            $q = "SET foreign_key_checks = 1";
            $req = $bdd->prepare($q);
            $result = $req->execute();
        }
    }



?>
