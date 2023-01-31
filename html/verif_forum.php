<?php
session_start();
// Connexion à la base de données


try{
    $bdd = new PDO('mysql:host=164.132.55.186;port=3306;dbname=EWHOLE; charset=utf8', 'Admin', 'MDP.De.Qualite', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch(Exception $e){
  die('Erreur : ' . $e->getMessage());
}



$commentaire = htmlspecialchars($_POST['submit_forum']);
$date = date('Y-m-d');

// Requête préparée avec nom de valeurs
$q = 'INSERT INTO forum (texte_forum, Date_ajout, email_user) VALUES (:texte_forum, :Date_ajout, :email_user)';
$req = $bdd->prepare($q);
$result = $req->execute([
    'texte_forum' => $_POST['submit_forum'],
    'Date_ajout' => $date,
    'email_user' => $_SESSION['email'],
    ]);

$allcomm =('SELECT * FROM forum');
$req2 =  $bdd -> prepare($allcomm);


if($result) {
    header('location: index_forum.php?message=Votre commentaire a bien été ajouté');
    exit;

}
else{
    header('location: index_forum.php?message=Erreur lors de l\'ajout de votre commentaires');
    exit;
}


?>




