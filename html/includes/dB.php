<?php

try{
    $bdd = new PDO('mysql:host=164.132.55.186;port=3306;dbname=EWHOLE; charset=utf8', 'Admin', 'MDP.De.Qualite', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch(Exception $e){
  die('Erreur : ' . $e->getMessage());
}
?>