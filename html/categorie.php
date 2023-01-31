<title>Categorie</title>
<link rel="stylesheet" href="css/carteProduit.css">
<?php
        session_start();
        include 'includes/header.php';
        include 'includes/nav.php';
        include 'includes/dB.php';
        $actual_page = 'categorie.php';
        include 'includes/logVerif.php';


?>
            <div class="container position-relative px-4 px-lg-5" style="margin-top: 100px;">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                        <?php
                            echo '<h1>'. $_GET['cat'] .'</h1>';
                        ?>
                        </div>
                    </div>
                </div>
            </div>


            <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                    <?php

                    $categorie = htmlspecialchars($_GET['cat']);

                    $productSel = $bdd->prepare('SELECT product_name, product_desc, product_price, product_quantity, product_image FROM producttb WHERE product_categorie=?');
                    $productSel->execute(array($categorie));
                    $productInfo = $productSel->fetchAll();

                        for($i = 0; $i < count($productInfo); $i++){
                        echo '<div class="col-lg-3 col-md-12 mb-4">
                                    <div class="card carte h-100">
                                        <div class="card-body">
                                            <div class="imageproduit" >
                                            <a href="#" style="font-size:25px; position: absolute; right: 10px; top: 8px;"><ion-icon name="heart-outline" title="Favoris" ></ion-icon></a>                                <div style=" display: flex; justify-content: center; align-items: center;"><img src="'.$productInfoVendeur[$i]["product_image"].'" class="img-fluid" alt=""></div>
                                            </div>
                                        </div>
                                        <ul class="list-group pt-2 px-2 list-group-flush description">
                                            <li class="list-group-item px-1 titre">
                                                <h4>'.$productInfo[$i]["product_name"].'</h4>
                                                <h5>'.$productInfo[$i]["product_desc"].'</h5>
                                                <h6>'.$productInfo[$i]["product_price"].' € / KG</h6>
                                            </li>
                                        </ul>
                                        <ul class="list-group list-group-flush prix">
                                            <li class="list-group-item pt-2 pb-2">
                                                <h4>'.$productInfo[$i]["product_price"].' €</h4>
                                            </li>
                                        </ul>
                                    </div>
                                </div>';
                            }
                    ?>
                    </div>
                </div>
            </div>