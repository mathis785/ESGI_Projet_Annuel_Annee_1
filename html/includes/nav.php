<link rel="stylesheet" href="../css/nav.css">
<?php include('header.php') ?>
<?php include 'includes/userInfo.php' ?>

<header  class="sticky retourblanc">
    <div class="container">
        <div class="row">
            <article class="col-md-2 logo">
                <a href="index.php"><img src="images/Capture-remove.png" alt="logo"></a>
            </article>

            <div class="col-md-5 recherche row height d-flex justify-content-center align-items-center search">

                <div class="col-md-10">
                    <div class="form">
                        <i class="fa fa-search"></i>
                        <input type="text" class="form-control form-input" name="search_text" id="search_text" onkeyup="imu(this.value)" placeholder="Pain, Banane, Pates...">
                    </div>
                    <div id="content"></div>
                </div>            
                
                <script type="text/javascript">
                    let content = document.getElementById('content');

                    function imu(x){
                        if(x.length == 0) {
                            content.innerHTML = '';
                        }
                        else{
                            var XML = new XMLHttpRequest;
                            XML.onreadystatechange = function(){
                                if(XML.readyState == 4 && XML.status == 200) {
                                    content.innerHTML = XML.responseText;
                                }
                            }
                            XML.open('GET','search.php?q='+x, true);
                            XML.send();
                        }
                    }
                </script>
                
            </div>
            <div class="col-md-5 row icons">
                <div class="col-md-4 profil p-0">
                    <?php 
                    if(isset($_SESSION['email'])){
                        if($role == 2){
                            echo '<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <ion-icon name="person-outline" class="marge"></ion-icon>
                                    <h3>Back Office</h3> 
                                </button>
                                <div class="dropdown-menu menu">
                                    <a class="dropdown-item" href="../dash.php"><strong>Office <i class="fa-solid fa-arrow-right-to-bracket"></i></strong></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item deconnexion" href="deconnexion.php">Me Deconnecter</a>
                                </div>';
                        }
                    else{
                        echo '<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <ion-icon name="person-outline" class="marge"></ion-icon>
                                <h3> Bonjour ' . $userInfo[0]["usersFName"] . '</h3> 
                            </button>
                            <div class="dropdown-menu menu">
                                <a class="dropdown-item" href="profil.php"><strong>Mon profil <i class="fa-solid fa-arrow-right-to-bracket"></i></strong></a>
                                <a class="dropdown-item" href="#">Mes Favoris</a>
                                <a class="dropdown-item" href="userInfoDl.php">Mes infos personnelles</a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Aide & Contact</a>
                                <a class="dropdown-item deconnexion" href="deconnexion.php">Me Deconnecter</a>
                            </div>
                            '
                ;
                        }
                    }
                    else{
                        echo '
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <ion-icon name="person-outline" class="marge"></ion-icon>
                                <h3>Se connecter</h3> 
                            </button>
                            <div class="dropdown-menu menu">
                                <a class="dropdown-item" href="connexion.php"><strong>Connexion <i class="fa-solid fa-arrow-right-to-bracket"></i></strong></a>
                                <a class="dropdown-item" href="inscription.php">Inscription</a>
                            </div>';
                    } ?>
                </div>
            
                <div class="col-md-2 aide p-0">
                    <ion-icon name="information-circle-outline" class="marge"></ion-icon>
                    <a><h3>Aide</h3></a>
                </div>
            <?php    if(isset($_SESSION['email'])){
                echo'<div class="col-md-2 panier p-0">';
                       echo'  <a class="panier_componant" href="panier.php">';
                   echo'     <ion-icon name="bag-handle-outline" class="marge"></ion-icon>';
                      echo'  <h3>Panier</h3>';
                  echo'  </a>';
            echo'    </div> ';}else{
                    
                 echo'   <div class="col-md-2 panier p-0">';
                       echo'  <a class="panier_componant" href="connexion.php">';
                      echo'  <ion-icon name="bag-handle-outline" class="marge"></ion-icon>';
                        echo'<h3>Panier</h3>';
                  echo'  </a>';
              echo'  </div> ';

                }?>
                <div class="col-md-3 p-0 mode_sombre">
                    <label>
                        <input type="checkbox">
                        <span><ion-icon name="moon-outline"></ion-icon></span>
                    </label>
                </div>
                
                <script type="text/javascript">
                    console.log("massi");
                    window.addEventListener("scroll", function(){
                        var header = document.querySelector("header");
                        header.classList.toggle("sticky", window.scrollY > 0);
                    })
                </script>
                <script type="text/javascript">
                    console.log("massi");
                    window.addEventListener("scroll", function(){
                        var header = document.querySelector("header");
                        header.classList.toggle("retourblanc", window.scrollY < 100);
                    })
                </script>
            </div>
        </div>
    </div>
</header>

