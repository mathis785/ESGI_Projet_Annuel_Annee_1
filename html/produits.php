
<?php
    include 'includes/verifRoleAdmin.php';
    $actual_page = 'produits.php';
    include 'includes/bodyDash.php';
    include 'includes/Product.php';
    
?>

<link rel="stylesheet" href="css/carteProduit.css">

<div class="bg-gray-200 text-sm">
  <div class="container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 py-3">
        <li class="breadcrumb-item"><a class="fw-light" href="dash.php">Home</a></li>
        <li class="breadcrumb-item active fw-light" aria-current="page">Produits </li>
      </ol>
    </nav>
  </div>
</div>

<section class="pb-5"> 
            <div class="container" style="background: white;">
            <div class="col-12">
              <div class="mb-4 mb-lg-0" >  

                <p class="text-center mt-4 mb-2 fs-2 fw-bold">Ajouter un article</p>   

                <div class="row">
                  <form id="addProduct" method="POST" enctype="multipart/form-data" class="container" style="flex-direction:column;  align-items:center; justify-content:center">
                    <div class="row  d-flex justify-content-center" style="padding: 0px 10%">
                      <div class="col-6 p-3">

                        <div class="input-group" style="margin-bottom: 13px;">
                          <input class="form-control" type="text" placeholder="Nom de l'article"  name="articleName">
                        </div>
                        <div class="input-group mb-3">
                          <input class="form-control desc-input" type="text" placeholder="Description" aria-label="articleDescription" aria-describedby="basic-addon2" name="articleDescription">
                        </div>
                        <div class="input-group mb-3">
                          <input class="form-control" type="text" placeholder="Quantité" aria-label="articleQuantity" aria-describedby="basic-addon2" name="articleQuantity">
                        </div>
                        <div class="input-group mb-3"><span class="input-group-text">€/kg</span><span class="input-group-text">0.00/kg</span>
                          <input class="form-control" type="text" aria-label="Prix en euro/kg" placeholder="Prix de l'article en kg" name="articlePrice">
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
                        <p style="color : red"; id="erreur"></p>

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
          </div>
          
          <div class="container px-4 pt-4 pb-3">
            <div class="row">
          <?php
          for($i = 0; $i < count($productInfo); $i++){
          echo '
          <div class="col-lg-3 col-md-12 mb-4">
            <form id="deleteProduct" method="POST" enctype="multipart/form-data">
              <div class="card h-100">

                  <div class="card-body">
                      <div class="imageproduit" >
                          <a href="#" style="font-size:25px; position: absolute; right: 10px; top: 8px;"><ion-icon name="heart-outline" title="Favoris" ></ion-icon></a>
                          <div style=" display: flex; justify-content: center; align-items: center;"> <img src=' . $productInfo[$i]["product_image"] . ' class="img-fluid" style=""> </div>
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
                        <button type="button" class="delete" onclick="deleteProduct(' . $productInfo[$i]["id"] . ')"><i class="fa-solid fa-trash-can"></i></button> 
                      </li>
                  </ul>
              </div>
            </form>
          </div>';
              }
              ?>
              
              </div>
            </div>
        </div>
      </section>
<script src="js/deleteProduct.js" defer></script>

      