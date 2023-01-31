<?php

if(isset($_SESSION['fileDest'])){
    /* // Donner le chemin complet du dossier dans lequel on va sauvegarder l'image
    $folder = "uploads/";
    move_uploaded_file($_FILES["imageupload"]["tmp_name"], "$folder" . $_FILES["imageupload"]["name"]);
    $file = 'uploads/' . $_FILES["imageupload"]["name"];

    $uploadimage = $folder . $_FILES["imageupload"]["name"];
    $newname = $_FILES["imageupload"]["name"];

    //Definir le nom
    $thumbnail = $folder . $newname . "_thumbnail.png";
    $actual = $folder . $newname . ".png";
    $imgname = $newname . "_thumbnail.png"; */


    $uploadimage = $_SESSION['fileDest'];

    // charger l'image
    $source = imagecreatefrompng($uploadimage);



    // charger l'image qui servira de filigrane
    $watermark = imagecreatefrompng('uploads/logocomplet2Transparent.png');



    // prendre witdh et height du filigrane
    $water_width = imagesx($watermark);
    $water_height = imagesy($watermark);

    // prendre witdh et height de l'image a filigranée
    $main_width = imagesx($source);
    $main_height = imagesy($source);


    // selectionner l'endroit ou le filigrane va s'apposer
    $dime_x = 0;
    $dime_y = 0;

    // copier les images
    imagecopy($source, $watermark, $dime_x, $dime_y, 0, 0, $water_width, $water_height);

    // processus final : creation de l'image filigranée
    imagepng($source, $thumbnail, 9);
    
    header('location: produits.php.php?message=L\'image a bien ete filigranée.');
}







?>
















