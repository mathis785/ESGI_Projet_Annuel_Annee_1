<link rel="stylesheet" href="css/footer.css">
        <footer class="py-5">

            <div class="container">
                <div class="d-flex justify-content-between py-4 my-4 border-top"></div>
                <div class="row">
                <div class="col-2"></div>
                <div class="col-2">
                <?php
                    if(isset($_SESSION['email'])){
                        
                    echo'  <h5>Forum</h5>';
                        echo'    <ul class="nav flex-column">';
                            echo'   <li class="nav-item mb-2"><a href="index_forum.php" class="nav-link p-0 text-muted">Discuter</a></li>';
                                
                        echo'   </ul>';
                    }else{
                        echo'<h5>Forum</h5>';
                            echo'<ul class="nav flex-column">';
                                echo'<li class="nav-item mb-2"><a href="connexion.php" class="nav-link p-0 text-muted">Discuter</a></li>';              
                            echo'</ul>';
                        }
                    ?>
                </div>
            
               <style>
                   .section li a {
                       text-decoration: none;
                       color: #212121;
                   }
                   .section li:hover {
                       text-decoration: none;
                       color: rgb(246, 139, 30);
                   }
               </style>
            
                <div class="col-2">
                    <h5>Section</h5>
                    <ul class="nav section flex-column">
                        <li class="nav-item mb-2"><a href="connexion.php" class="nav-link p-0 text-muted">Connexion</a></li>
                        <li class="nav-item mb-2"><a href="inscription.php" class="nav-link p-0 text-muted">Inscription</a></li>
                        <li class="nav-item mb-2"><a href="index.php" class="nav-link p-0 text-muted">Top</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>
            
                <div class="col-5 offset-1">
                    <div class="d-flex gap-2">
                        <a href="index.php"><img src="images/Capture-remove.png" alt="logo" width="300px"></a>
                    </div>
                </div>
                </div>
            
                <div class="d-flex justify-content-between py-4 my-4 border-top">
                <p>© <?= date('Y')?> Lupum, Inc. All rights reserved.</p>
                <ul class="list-unstyled d-flex réseaux">
                    <li class="ms-3 twitter"><a class="link-dark" href="https://dino-chrome.com/"><i class="fa-brands fa-twitter"></i></a></li>
                    <li class="ms-3 linkedin"><a class="link-dark" href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                    <li class="ms-3 facebook"><a class="link-dark" href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li class="ms-3 instagram"><a class="link-dark" href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    <li class="ms-3 youtube"><a class="link-dark" href="https://www.youtube.com/watch?v=XZ6mnaKMq4A"><i class="fa-brands fa-youtube"></i></a></li> 
                </ul>
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html> 