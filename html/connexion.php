<?php include 'includes/header.php' ?>
<title>Connexion</title>


<link href="css/connexion.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="verif_connexion.php" method="post">
    <a href="index.php">
      <img width="100%" class="mb-4" src="images/Capture-remove.png">
    </a>
    <h1 class="h3 mb-3 fw-normal">Me connecter</h1>

    <?php include 'includes/message.php' ?>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
      <label for="floatingInput">Adresse mail</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Mot de passe</label>
    </div>

    <div class="checkbox mb-3 register">
      <label>
        <input type="checkbox" value="remember-me"> Se souvenir de moi
      </label>
      <p><br>Vous n’avez pas de compte ?<a href="inscription.php"><br>Enregistrez-vous !</a></p>
    </div>
    <button class="w-100 btn btn-lg btn-secondary" type="submit" name="submit">Se connecter</button>
    <p class="mt-5 mb-3 text-muted">© <?= date('Y')?> Lupum, Inc. All rights reserved.</p>
  </form>
</main>


    
  </body>
</html>


