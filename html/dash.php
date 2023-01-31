<link rel="icon" type="image/png" sizes="16x16" href="../images/logo3.png">
<link rel="stylesheet" href="css/dash.css">
<?php
    include 'includes/verifRoleAdmin.php';
    $actual_page = 'dash.php';
    include 'includes/bodyDash.php';
?>

<style>

body{
  font-family: 'Nunito', sans-serif;
  padding: 50px;
}
.card{
    border-radius: 4px;
    background: #fff;
    box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
      transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
  padding: 14px;
  cursor: help;
  margin: 10px 0px 0px 0px;
}

.card:hover{
     transform: scale(1.05);
  box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
}

.card h3{
  margin: 0;
  color: #545454;
}
.card .nombre {
    font-size: 25px; 
    font-weight: 600;
    margin: 0px 0px 0px 5px;
    color: rgb(246, 139, 30);
}
.card .temps {
    font-size: 22px; 
    margin-bottom: 15px;
    color: #212121;
}

.card img{
  position: absolute;
  top: 20px;
  right: 15px;
  max-height: 120px;
}
.description {
    display: flex;
    justify-content: center;
    align-items: center;
    border-top: 1px solid #c5c5c5;
    padding: 20px 0px 6px 0px
}

@media(max-width: 990px){
  .card{
    margin: 20px;
  }
} 
</style>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-lg-4 col-sm-12">
            <div class="card card-3">
                <h2 class="text-center temps">Aujourd'hui</h2>
                <div class="description">
                    <h3>Nombre de Visites :</h3>
                    <?php
                    echo '<h2 class="nombre">' . $currentConnexion[0]["COUNT(idLog)"] . '</h2>';
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12">
            <div class="card card-3">
                <h2 class="text-center temps">30 Derniers Jours</h2>
                <div class="description">
                    <h3>Nombre de Visites :</h3>
                    <?php
                    echo '<h2 class="nombre">' . $connexion30[0]["COUNT(idLog)"] . '</h2>';
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12">
            <div class="card card-3">
                <h2 class="text-center temps">Total des Visites</h2>
                <div class="description">
                    <h3>Nombre de Visites :</h3>
                    <?php
                    echo '<h2 class="nombre">' . $Connexion[0]["COUNT(idLog)"] . '</h2>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

