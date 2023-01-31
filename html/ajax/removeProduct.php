<?php
include('../includes/dB.php');

if(isset($_GET['id'])){

    $id = htmlspecialchars($_GET['id']);
    echo $id;

    $remove = 'DELETE FROM producttb WHERE id = ?';

        $send = $bdd->prepare($remove);
        $send->execute(array($id));
        echo "validated:Produit supprimé avec succès";
}