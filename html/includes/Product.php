<?php
include('includes/userInfo.php'); 

$productSel = $bdd->prepare('SELECT id, product_name, product_desc, product_price, product_quantity, product_image FROM producttb');
$productSel->execute();
$productInfo = $productSel->fetchAll();

$productVSel = $bdd->prepare('SELECT id, product_name, product_desc, product_price, product_quantity, product_image FROM producttb WHERE productUserId=?');
$productVSel->execute(array($idUser[0]['usersId']));
$productInfoVendeur = $productVSel->fetchAll();
?>