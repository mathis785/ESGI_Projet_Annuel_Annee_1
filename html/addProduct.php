<?php

    session_start();
    include('includes/userInfo.php'); 

    if(empty($_POST["articleName"]) || empty($_POST["articleDescription"]) || empty($_POST["articleQuantity"]) || empty($_POST["articlePrice"])){
        echo 'err:Tout les champs ne sont pas remplis !';
    }

    if(!is_numeric($_POST["articlePrice"]) || !is_numeric($_POST["articleQuantity"])){
        echo 'err:Le prix et la quantité doivent être un nombre';
    }

    $name = htmlspecialchars($_POST["articleName"]);
    $desc = htmlspecialchars($_POST["articleDescription"]);
    $quantity = htmlspecialchars($_POST["articleQuantity"]);
    $price = htmlspecialchars($_POST["articlePrice"]);
    $categorie = htmlspecialchars($_POST["categorie"]);

    $file = $_FILES['imageProduct'];

    $fileName = $_FILES['imageProduct']['name'];
    $fileTmpName = $_FILES['imageProduct']['tmp_name'];
    $fileSize = $_FILES['imageProduct']['size'];
    $fileError = $_FILES['imageProduct']['error'];
    $fileType = $_FILES['imageProduct']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'avif');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 500000){
                $fileNameNew = uniqid('', true) .".".$fileActualExt;
                $fileDestination = 'uploads/produits/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                //filigrane($fileDestination);
                $_SESSION['fileDest'] = $fileDestination;

                $q = 'INSERT INTO producttb (product_name, product_desc, product_price, product_quantity, product_categorie, product_image, productUserId) VALUES (:productName, :productDesc, :productPrice, :productQuantity, :productCategorie, :productImage, :productUserId)';
                $req = $bdd->prepare($q);
                $result = $req->execute([
                    'productName' => $name,
                    'productDesc' => $desc,
                    'productPrice' => $price,
                    'productQuantity' => $quantity,
                    ':productCategorie' => $categorie,
                    'productImage' => $fileDestination,
                    'productUserId' => $idUser[0]['usersId']
                            
                    ]);  

                    echo "validated:Le produit a été ajouté avec succés !";
            }else{
                echo "err:Votre image est trop lourde !";
            }
        }else{
        echo "err:Il y a eu une erreur avec l'enregistrement de votre image !";
        }
    }else{
        echo "err:Vous ne pouvez pas utiliser d'image de ce type !";
    }



?>