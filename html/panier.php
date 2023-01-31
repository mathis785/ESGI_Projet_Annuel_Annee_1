<?php
    session_start();
    include('includes/header.php');
    include 'includes/dB.php';
    $actual_page = 'panier.php';
    include 'includes/logVerif.php';
require_once ("includes/db_panier.php");
require_once ("includes/articles_panier.php");

$db = new CreateDb("EWHOLE", "producttb");

if (isset($_POST['remove'])){
    if ($_GET['action'] == 'remove'){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["product_id"] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
                header('location: panier.php?message=Le produit abien été retirer de votre panier.& type=success');
                echo "<script>window.location = 'panier.php'</script>";
            }
        }
    }
}


?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/4be5420d1f.js" crossorigin="anonymous"></script>
<link rel="icon" type="image/png" sizes="16x16" href="../images/logo3.png">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/panier.css">
<title>Panier</title>
<body>

<?php require_once ("includes/header.php"); ?>
<?php include('includes/nav.php'); ?>
<?php
if(isset($_GET['message']) && !empty($_GET['message']) && isset($_GET['type'])){
    echo '<div class="alert alert-' . $_GET['type'] . '">' . htmlspecialchars($_GET['message']) . '</div>';
}


?>

<div class="container conteneur">
    <div class="card">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Votre panier</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-muted">
                            <?php if (isset($_SESSION['cart'])){
                            $count  = count($_SESSION['cart']);
                            echo "<h6>$count article(s)</h6>";
                            }?>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-bottom ">
                    <div class="row main align-items-center">
                        <?php
                        $total = 0;
                            
                            if (isset($_SESSION['cart'])){
                                $product_id = array_column($_SESSION['cart'], 'product_id');

                                $result = $db->getData();
                                while ($row = mysqli_fetch_assoc($result)){
                                    foreach ($product_id as $id){
                                        if ($row['id'] == $id){
                                            cartElement($row['product_image'], $row['product_name'],$row['product_price'], $row['id']);
                                            $total = sprintf('%.2f', $total + (int)$row['product_price']);
                                        }
                                    }
                                }
                            }else{
                                echo "<img src=\"images/panier_vide.PNG\" alt=\"panier vide\" style=\"width:350px; \">";
                            }
                        ?>
                        
                        <div class="col prix">

                        </div>
                    </div>                
                    <div class="back-to-shop"><a href="index.php"><i class="fa-solid fa-arrow-left-long"></i><span class="text-muted" style="margin-left: 5px;">Continuer vos achats</span></a></div>
                </div>
            </div>
            <div class="col-md-4 summary">
                <div>
                    <h5><b>Sommaire</b></h5>
                </div>
                <hr>
                <div class="row">
                    <div class="col"> <?php if (isset($_SESSION['cart'])){
                            $count  = count($_SESSION['cart']);
                            echo "<h6>Prix $count article(s)</h6>";
                        }else{
                            echo "<h6>Prix 0 article</h6>";
                        }
                        ?></div>
                        
                    <div class="col text-right"><h6><?php echo sprintf('%.2f', $total)  ; ?> €</h6></div>
                </div>
                <form>
                    <p>Livraison</p> <select name="livraison">
                        <option class="text-muted" value="10">Livraison Rapide (3 jours) - 10.00 €</option>
                        <?php $livraison = 10 ?>

                        

                    </select>
                  
                </form>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col-5">PRIX TOTAL</div>
                    <center><h6><?php
                    $totalfinal = $total + $livraison;
                        echo $totalfinal ;
                        ?> €</h6></center>
                </div> 
                <a href="index_paiement.php?data=<?=$totalfinal?>"> <button class="btn"> PAYER</button></a>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');