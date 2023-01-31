
<?php 
session_start();
if(!isset($_SESSION['email'])){
  header('location: index.php');
  exit;
}
include 'includes/userInfo.php';
include 'includes/header.php' ;
include 'includes/nav.php';
$actual_page = 'profil.php';
include 'includes/logVerif.php';
include 'includes/Product.php';
?>
<script src="js/profil.js" defer></script>
<link rel="stylesheet" href="css/profil.css">
<title>Mon profil</title>

<section style="background-color: #eee;">
  <div class="container py-5">
  <div class="alert" role="alert">
  <?php
  if($userInfo[0]['mailVerif'] == 0){
  echo '<div class="alert alert-warning" role="alert">';
  
    
    $s = 'Mail de verification';
    $mail = $userInfo[0]['usersEmail'];

    
    echo '<p style="margin:0;">Votre compte n\'est pas activé ! Pour l\'activer avec votre mail ( ' . $userInfo[0]['usersEmail'] . ' ) <button class=\'btn btn-link\' onClick="sendmail(\''.$s.'\',\''.$m.'\',\''.$mail.'\')"> cliquer ici </button> </p>';
    }

  ?>
  
  </div>
  
    <div class="row">
      <?php  
      include 'includes/message.php';
      ?>
      <div class="col-lg-4">
        <div class=" mb-4" style="background: white;">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
            <?php 
            echo '<h5 class="my-3">' . $userInfo[0]['usersFName'] . ' ' . $userInfo[0]['usersLName'] . '</h5>';
            
            if($userInfo[0]['usersRole'] == 1)
            {
            echo '<p class="text-muted mb-1">' . $userInfo[0]['usersStatus'] . '</p>';
            }
            
                if($userInfo[0]['Numero_rue'] == NULL && $userInfo[0]['Nom_rue'] == NULL && $userInfo[0]['Ville'] == NULL && $userInfo[0]['Code_Postal'] == NULL){
                    echo '<p class="text-muted mb-0">Adresse</p>';
                }else{
                  echo '<p class="text-muted mb-0">' . $userInfo[0]['Numero_rue'] .' ' . $userInfo[0]['Nom_rue'] .' ' . $userInfo[0]['Ville'] .', ' . $userInfo[0]['Code_Postal'] . '</p>';
                }
              ?>

            <div class="d-flex justify-content-center mb-2">
              <a href="deconnexion.php"> <button type="button" class="btn btn-danger">Se deconnecter</button> </a>
              <button type="button" class="btn btn-outline-info ms-1"><a href="editProfil.php" style="text-decoration : none">Modifier</a></button>
            </div>
          </div>
        </div>
      </div>


      <div class="col-lg-8">
        <div class= "mb-4" style="background: white;">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nom complet</p>
              </div>
              <div class="col-sm-9">
                <?php
                echo '<p class="text-muted mb-0">' . $userInfo[0]['usersFName'] . ' ' . $userInfo[0]['usersLName'] . '</p>';
                ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
              <?php
                echo '<p class="text-muted mb-0">' . $userInfo[0]['usersEmail'] . '</p>';
              ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
              <?php 
                if($userInfo[0]['Numero'] == NULL){
                    echo '<p class="text-muted mb-0">Telephone</p>';
                }else{
                  echo '<p class="text-muted mb-0">' . $userInfo[0]['Numero'] . '</p>';
                }
              ?>
                
              </div>
            </div>
            
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Addresse</p>
              </div>
              <div class="col-sm-9">
              <?php 
                if($userInfo[0]['Numero_rue'] == NULL && $userInfo[0]['Nom_rue'] == NULL && $userInfo[0]['Ville'] == NULL && $userInfo[0]['Code_Postal'] == NULL){
                    echo '<p class="text-muted mb-0">Adresse</p>';
                }else{
                  echo '<p class="text-muted mb-0">' . $userInfo[0]['Numero_rue'] .' ' . $userInfo[0]['Nom_rue'] .' ' . $userInfo[0]['Ville'] .', ' . $userInfo[0]['Code_Postal'] . '</p>';
                }
              ?>
              </div>
            </div>
          </div>
        </div>
    </div> 
            <?php
        if($userInfo[0]['usersStatus'] == "Vendeur"){
          echo '
          <div class="container" style="background: white;">
            <div class="col-12">
              <div class="mb-4 mb-lg-0" >  

                <p class="text-center mt-4 mb-2 fs-2 fw-bold">Ajouter un article</p>   

                <div class="row">
                  <form id="addProduct" method="POST" enctype="multipart/form-data" class="container" style="flex-direction:column;  align-items:center; justify-content:center">
                    <div class="row  d-flex justify-content-center" style="padding: 0px 10%">
                      <div class="col-6 p-3">

                        <div class="input-group" style="margin-bottom: 13px;">
                          <input class="form-control" type="text" placeholder="Nom de l\'article"  name="articleName">
                        </div>
                        <div class="input-group mb-3">
                          <input class="form-control desc-input" type="text" placeholder="Description" aria-label="articleDescription" aria-describedby="basic-addon2" name="articleDescription">
                        </div>
                        <div class="input-group mb-3">
                          <input class="form-control" type="text" placeholder="Quantité" aria-label="articleQuantity" aria-describedby="basic-addon2" name="articleQuantity">
                        </div>
                        <div class="input-group mb-3"><span class="input-group-text">€/kg</span><span class="input-group-text">0.00/kg</span>
                          <input class="form-control" type="text" aria-label="Prix en euro/kg" placeholder="Prix de l\'article en kg" name="articlePrice">
                        </div>
                        <div class="col-sm-9">
                          <select class="form-select mb-3" name="categorie">
                            <option disabled>-- Choix de la catégorie --</option>
                            <option>Fruits et légumes</option>
                            <option>Viandes et Poissons</option>
                            <option>Pains et Pâtisseries</option>
                            <option>Pates</option>
                            <option>Frais</option>
                            <option>Surgelés</option>
                            <option>Boissons</option>
                          </select>
                        </div>
                        <label class="col-4 form-label" for="formFile">Image du produit :</label>
                        <div class="col-sm-9">
                          <input class="form-control" name="imageProduct" type="file">
                        </div>
                        <div id="erreur">

                        </div>

                      </div>

                    </div>
                    <div class="row mb-3 d-flex justify-content-center" style="padding: 0px 12%">
                      <div class="col-4 d-flex justify-content-end">
                        <button class="btn btn-secondary" type="reset">Annuler</button>
                        <button class="btn btn-success" type="submit" style="margin-left: 5px">Ajouter</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>'
          ?>

          <div class="row py-5">
          <?php
          for($i = 0; $i < count($productInfoVendeur); $i++){
          echo '<div class="col-lg-3 col-md-12 mb-4">
                    <div class="card carte h-100">
                        <div class="card-body">
                            <div class="imageproduit" >
                            <a href="#" style="font-size:25px; position: absolute; right: 10px; top: 8px;"><ion-icon name="heart-outline" title="Favoris" ></ion-icon></a>                                <div style=" display: flex; justify-content: center; align-items: center;"><img src="'.$productInfoVendeur[$i]["product_image"].'" class="img-fluid" alt=""></div>
                            </div>
                        </div>
                        <ul class="list-group pt-2 px-2 list-group-flush description">
                            <li class="list-group-item px-1 titre">
                                <h4>'.$productInfoVendeur[$i]["product_name"].'</h4>
                                <h5>'.$productInfoVendeur[$i]["product_desc"].'</h5>
                                <h6>'.$productInfoVendeur[$i]["product_price"].' € / KG</h6>
                            </li>
                        </ul>
                        <ul class="list-group list-group-flush prix">
                            <li class="list-group-item pt-2 pb-2">
                                <h4>'.$productInfoVendeur[$i]["product_price"].' €</h4>
                                <button type="button" class="delete" onclick="deleteProduct(' . $productInfoVendeur[$i]["id"] . ')"><i class="fa-solid fa-trash-can"></i></button> 
                            </li>
                        </ul>
                    </div>
                </div>';
              }
            }?>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="js/product.js" defer></script>
<script src="js/deleteProduct.js" defer></script>
<?php include 'includes/footer.php' ?>

