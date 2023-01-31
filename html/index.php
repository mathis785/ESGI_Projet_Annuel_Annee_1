
<?php
        session_start();
        include 'includes/db_panier.php';
        require_once ('includes/articles_panier.php');
        include 'includes/header.php';
        include 'includes/nav.php';
        include 'includes/dB.php';
        $actual_page = 'index.php';
        include 'includes/logVerif.php';
$database = new CreateDb("EWHOLE", "producttb");
        
        ?>

<link rel="stylesheet" href="css/index.css">

<title>Accueil</title>
<body>

  <main>
      <div class="container px-3 mb-4" style="margin-top: 100px;">
        <button
            type="button"
            class="btn btn-danger btn-floating btn-lg"
            id="btn-back-to-top"
            >
        <i class="fas fa-arrow-up"></i>
        </button>

          <div class="row">
              <div class="col-md-2 col-sm-3" >
                  <div class="categories h-70">
                      <ul>
                        <li><h5 style="font-size: 17px;">Catégories</h5></li>
                        <li>
                            <a href="categorie.php?cat=Bio"><img src="images/1838.avif" alt="" width="30px" style="margin-right: 2px;"></a>
                            <a href="categorie.php?cat=Bio">Bio et Ecologie</a>
                        </li>
                        <li>
                            <a href="categorie.php?cat=Fruits et Légumes"><img src="images/1882.avif" alt="" width="30px" style="margin-right: 2px;"></a>
                            <a href="categorie.php?cat=Fruits et Légumes">Fruits et Légumes</a></li>
                        <li>
                            <a href="categorie.php?cat=Viandes et Poissons"><img src="images/1921.jpg" alt="" width="30px" style="margin-right: 2px;"></a>
                            <a href="categorie.php?cat=Viandes et Poissons">Viandes et Poissons</a></li>
                        <li>
                            <a href="categorie.php?cat=Pains et Pâtisseries"><img src="images/1952.avif" alt="" width="30px" style="margin-right: 2px;"></a>
                            <a href="categorie.php?cat=Pains et Pâtisseries">Pains et Pâtisseries</a></li>
                        <li>
                            <a href="categorie.php?cat=Frais"><img src="images/28127.avif" alt="" width="30px" style="margin-right: 2px;"></a>
                            <a href="categorie.php?cat=Frais">Frais</a></li>
                        <li>
                            <a href="categorie.php?cat=Surgelés"><img src="images/2074.avif" alt="" width="30px" style="margin-right: 2px;"></a>
                            <a href="categorie.php?cat=Surgelés">Surgelés</a></li>
                        <li>
                            <a href="categorie.php?cat=Boissons"><img src="images/27070.avif" alt="" width="30px" style="margin-right: 2px;"></a>
                            <a href="categorie.php?cat=Boissons">Boissons</a></li><br>
                        
                      </ul>
                  </div>
              </div>

                <div class="pub col-md-8">
                    <div id="carouselExampleIndicators" class=" carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href="https://www.laboutiqueharibo.fr/" target="_blank"><img src="images/publicite2.jpg" class="d-block w-40" alt="Haribo" ></a>
                            </div>
                            <div class="carousel-item">
                                <a href="https://www.esgi.fr/" target="_blank"><img src="images/pubESGI.jpg" class="d-block w-40" alt="ESGI"></a>
                            </div>
                            <div class="carousel-item">
                                <a href="https://www.deejo.fr/fr/" target="_blank"><img src="images/publicite1.jpg" class="d-block w-40" alt="Sabatier"></a>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
               <!--  <div class="col-md-2 col-sm-3 px-0 pub">
                  <div class="div1">
                      <h3>En construction</h3>
                  </div>
                  <div class="div2">
                      <h3>En construction</h3>
                  </div>
              </div>    -->
            </div>
          </div>
      </div>
          </div>
      </div>
            <style>
                div .carte_pub1 a{background-image: url("images/ads1.PNG")}
                div .carte_pub2 a{background-image: url("images/ads2.PNG")}
                div .carte_pub3 a{background-image: url("images/ads3.PNG")}
                div .carte_pub4 a{background-image: url("images/ads4.PNG")}
            </style>
      <div class="container p-3">
        <section>
            <div class="row">
                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="carte_pub1 card-3"><a href="https://www.deejo.fr/fr/magasins" target="_blank"></a></div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="carte_pub2 card-3"><a href="https://www.sabatier-k.com/" target="_blank"></a></div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="carte_pub3 card-3"><a href="https://www.deejo.fr/fr/magasins" target="_blank"></a></div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="carte_pub4 card-3"><a href="https://www.deejo.fr/fr/magasins" target="_blank"></a></div>
                </div>
            </div>
        </section>
      </div>
      
            <?php if (isset($_POST['add'])){
                /// print_r($_POST['product_id']);
                if(isset($_SESSION['cart'])){

                    $item_array_id = array_column($_SESSION['cart'], "product_id");

                    if(in_array($_POST['product_id'], $item_array_id)){
                        header('location: index.php?message=Le produit est deja dans votre panier.& type=success');
                        echo "<script>window.location = 'index.php'</script>";
                    }else{

                        $count = count($_SESSION['cart']);
                        $item_array = array(
                            'product_id' => $_POST['product_id']
                        );

                        $_SESSION['cart'][$count] = $item_array;
                    }
                }else{

                    $item_array = array(
                        'product_id' => $_POST['product_id']
                    );

                    // Create new session variable
                    $_SESSION['cart'][0] = $item_array;
                }
            }
            
            ?>

            <div class="container">
                <div class="row p-5">
                    <?php
                    $result = $database->getData();
                    while ($row = mysqli_fetch_assoc($result)){
                        component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                    }
                    ?>
                </div>
            </div>
       <!--           
      <div class="card-body text-center voirplus">
          <button type="button" class="btn btn-outline-secondary" style="border-radius:20px; width: 150px; background-image: linear-gradient(94deg,#ff0a0a,#ff7539); color: white; border: none;">Voir plus</button>
      </div> -->

</main>

<script src="js/top.js" defer></script>
<?php include 'includes/footer.php' ?>