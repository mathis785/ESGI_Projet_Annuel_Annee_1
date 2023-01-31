<?php include 'includes/header.php' ?>
<title>Inscription</title>

<link href="css/inscription.css" rel="stylesheet">
<style>
	
  div{
    margin-bottom: 20px;
  }
  h4{
    font-size: 15px;
  }
</style>


</head>
<body class="text-center">
  <main class="form-signin">
    <form action="verif_inscription.php" method="POST">
      <a href="index.php">
        <img width="100%" class="mb-4" src="images/Capture-remove.png">
      </a>
      <h1 class="h3 mb-3 fw-normal">Créez Votre Compte</h1>

      <?php
      include 'includes/message.php'
      ?>

      <div class="form-floating">
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required="" name="email">
        <label for="exampleFormControlInput1" class="form-label">Adresse mail</label>
      </div>

      <div class="form-floating">
        <input type="texte" class="form-control" id="exampleFormControlInput1" placeholder="Votre nom" required="" name="lastName">
        <label for="exampleFormControlInput1" class="form-label">Nom</label>
      </div>
      
      <div class="form-floating">
        <input type="texte" class="form-control" id="exampleFormControlInput1" placeholder="Votre prénom" required="" name="firstName">
        <label for="exampleFormControlInput1" class="form-label">Prénom</label>	
      </div>

      <div class="form-floating">
        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required="" name="password">
        <label for="exampleFormControlInput1" class="form-label">Mot de passe</label>
      </div>

      <div class="form-floating">
        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required="" name="password2">
        <label for="exampleFormControlInput1" class="form-label"> Confirmez votre Mot de passe</label>
      </div>

      <h4>Sélectionnez Votre Statut</h4>
      <div>
        <input type="radio" class="btn-check" name="statut" id="acheteur" autocomplete="off" checked value="acheteur">
        <label class="btn btn-success" for="acheteur">Acheteur</label>
        <input type="radio" class="btn-check" name="statut" id="vendeur" autocomplete="off" checked value="vendeur">
        <label class="btn btn-success" for="vendeur">Vendeur</label>
      </div>
      </form>
      <div class="popup" id="popup-1">
        <div class="overlay"></div>
        <div class="content">
          <div class="close-btn" onclick="togglePopup()" title="Fermer">&times</div>
          <div class="title">
            <div class="titre">
                <h1>Captcha Puzzle</h1>
                <h3>Finir le puzzle pour valider le Captcha</h3>
            </div>
            <img src="images/captcha.png" alt="" >
          </div>
          <style> 
    
            #puzzle h2{ 
              text-align: center; 
            }
            #puzzle{ 
              display: grid; 
              grid-template-columns: repeat(3,80px); 
              width: 240px; 
              margin: auto;
            } 
            #puzzle img{ 
              width:80px; 
              box-sizing: content-box; 
            } 
            #puzzle .select{ 
              outline: 3px solid rgb(246, 139, 30); 
              outline-offset: -3px; 
            } 
            #win {
              text-align: center;
              font-size: 25px;
              color: rgb(255, 0, 0);
            }
            </style>  
            <h2 id='win'>&nbsp;</h2> 
            <div id='puzzle'></div>  
            
        </div>

      <div class="col-auto">
        <button class="w-100 btn btn-secondary captcha" type="submit" name="submit" onclick="togglePopup()">
          <div class="form-check">
            <input id="captcha_check" class="form-check-input check" type="checkbox" value="" id="flexCheckDefault" disabled/>
          </div>
          <h3>I'm not a robot</h3>
          <img src="images/captcha.png" alt="logo captcha">
        </button>
      </div>
      <div class="checkbox mb-3 register">
        <label>
        <input type="checkbox" value=""> Acceptez les <a href="#"> conditions d'utilisations</a> du site afin de pouvoir continuer
        </label><br><br>
        <button class="w-100 btn btn-lg btn-secondary" type="submit" name="submit">S'inscrire</button><br>
        <p><br>Vous avez deja un compte ?<a href="connexion.php"><br>Connectez vous !</a></p>
      </div>
      <p class="mt-5 mb-3 text-muted">© <?= date('Y')?> Lupum, Inc. All rights reserved.</p>
  
  </main>
  <script>
    function togglePopup() {
    document.getElementById("popup-1").classList.toggle("active");
    }
  </script>
  <script src="js/captcha.js"></script>
</body>
</html>