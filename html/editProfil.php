<title>Modification Profil</title>
<?php 
session_start();
if(!isset($_SESSION['email'])){
  header('location: index.php');
  exit;
}
include 'includes/userInfo.php';
include 'includes/header.php' ;
include 'includes/nav.php';
$actual_page = 'editProfil.php';
include 'includes/logVerif.php';
?>



<div class="container rounded bg-white mt-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" width="90">
            <?php
            echo '<span class="font-weight-bold">' . $userInfo[0]['usersFName'] . ' ' . $userInfo[0]['usersLName'] . '</span><span class="text-black-50">' . $userInfo[0]['usersStatus'] . '</span></div>'
            ?>
        </div>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                        <a href="profil.php" class="link-dark"><h6> Retour au profil</h6></a>
                    </div>
                    <h6 class="text-right">Edit Profile</h6>
                </div>
                <form action="verifProfil.php" method="POST" enctype="multipart/form-data">
                <div class="row mt-2">
                    <?php
                    echo '<div class="col-md-6"><input type="text" class="form-control" name="prenom" placeholder="Prénom" value="' . $userInfo[0]['usersFName'] . '"></div>
                    <div class="col-md-6"><input type="text" class="form-control" name="nom" placeholder="Nom" value="' . $userInfo[0]['usersLName'] . '"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><input type="email" class="form-control" name="email" placeholder="Email" value="' . $userInfo[0]['usersEmail'] . '"></div>
                    <div class="col-md-6"><input type="text" class="form-control" name="numero" placeholder="Numero de téléphone" value="' . $userInfo[0]['Numero'] . '"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><input type="text" class="form-control" name="ville" placeholder="Ville" value="' . $userInfo[0]['Ville'] . '"></div>
                    <div class="col-md-6"><input type="text" class="form-control" name="numeroRue" placeholder="Numero de rue" value="' . $userInfo[0]['Numero_rue'] . '"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><input type="text" class="form-control" name="nomRue" placeholder="Nom de rue" value="' . $userInfo[0]['Nom_rue'] . '"></div>
                    <div class="col-md-6"><input type="text" class="form-control" name="codePostal" placeholder="Code Postal" value="' . $userInfo[0]['Code_Postal'] . '"></div>'
                    ?>
                </div>
                <?php include 'includes/message.php'; ?>
                <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Enregitrer les modifications</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>
