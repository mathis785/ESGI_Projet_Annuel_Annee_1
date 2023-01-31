<?php
        session_start();
        include 'includes/db_panier.php';
        require_once ('includes/articles_panier.php');
        include 'includes/header.php';
        include 'includes/nav.php';
        include 'includes/dB.php';
        $actual_page = 'index.php';
        include 'includes/logVerif.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b830aec58f.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="../images/logo_icon.png">
    <title>Commentaires</title>
</head>
<main>


<?php
//empecher les injections sql
if(isset($_GET['message']) && !empty($_GET['message'])){
//echo "<script>alert(\"la variable est nulle\")</script>";
    echo'<h8>' . htmlspecialchars($_GET['message']. '');
}
?>




  <center>
      <h2 style="margin-top: 100px;">Forum de discussion Public </h2>

    <form method="POST" action="verif_forum.php">

       <?php echo '<h3>Utilisateur : ' . $_SESSION['email'] . '</h3>'; ?>
        <textarea placeholder="Votre message" name="submit_forum"></textarea>
        <input type="submit">

        <?php

        try{
            $bdd = new PDO('mysql:host=164.132.55.186;port=3306;dbname=EWHOLE; charset=utf8', 'Admin', 'MDP.De.Qualite', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
        catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
      
     $q = 'SELECT * FROM forum';
        $req = $bdd->prepare($q);
        $req->execute();
        $valeure = $req->fetchAll();
        $a = 0;

        while ($a < count($valeure)) {

            echo "<h4>" . $valeure[$a]['email_user'] . "</h4>";
        echo "<h4>" . $valeure[$a]['texte_forum'] . "</h4>";
        echo "<h5>" . "date_ajout :" . $valeure[$a]['Date_ajout'] . "</h5>";
        $a = $a + 1;
        }
        ?>

    </form>
  </center>



    </main>
</html>






















