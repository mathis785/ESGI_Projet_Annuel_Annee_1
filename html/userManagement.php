<?php
    include 'includes/verifRoleAdmin.php';
    $actual_page = 'userManagement.php';
    include 'includes/bodyDash.php';
?>

<div class="bg-gray-200 text-sm">
  <div class="container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 py-3">
        <li class="breadcrumb-item"><a class="fw-light" href="dash.php">Home</a></li>
        <li class="breadcrumb-item active fw-light" aria-current="page">Users </li>
      </ol>
    </nav>
  </div>
</div>

  
<div class="container">
  <div class="mt-5 pt-4">
  <h2>Utilisateurs :</h2>
    <div class="scrollable">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Prenom</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">Statut</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

          <?php  
            for($i = 0; $i < count($user); $i++){
              echo '<tr>
              <th scope="row" id="userId">' . $user[$i]["usersId"] . '</th>
              <td>' . $user[$i]["usersFName"] . '</td>
              <td>' . $user[$i]["usersLName"] . '</td>
              <td>' . $user[$i]["usersEmail"] . '</td>
              <td>' . $user[$i]["usersStatus"] . '</td>
              <td> <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#edit" onclick="recupMail(\'' . $user[$i]["usersEmail"] . '\')"><i class="fa-solid fa-pen"></i>
              </button> - <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#drop" onclick="recupId(' . $user[$i]["usersId"] . ')"><i class="fa-solid fa-trash-can"></i>
              </button></td>
            </tr>';

            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


        <!-- Modal edit-->
  <div class="modal fade text-start" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editLabel">Modification utilisateur</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Modification des infos de l'utilisateur.</p>
          <form id="modifyUser" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label class="form-label" for="editFName">Prenom</label>
              <input class="form-control" id="editFName" type="text" name="editFName" require>
            </div>
            <div class="mb-3">
              <label class="form-label" for="editLName">Nom</label>
              <input class="form-control" id="editLName" type="text" name="editLName" require>
            </div>
            <div class="mb-3">
              <label class="form-label" for="editEmail">Adresse mail</label>
              <input class="form-control" id="editEmail" type="email" aria-describedby="emailHelp" name="editEmail" require>
            </div>
            <div class="form-check">
              <input class="form-check-input" id="defaultRadio0" type="radio" name="exampleRadios" value="Acheteur">
              <label class="form-check-label" for="defaultRadio0">Acheteur</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" id="defaultRadio1" type="radio" name="exampleRadios" value="Vendeur" checked>
              <label class="form-check-label" for="defaultRadio1">Vendeur</label>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="submit">Save changes</button>
              </div>
          </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

          <!-- Modal drop-->
  <div class="modal fade text-start" id="drop" tabindex="-1" aria-labelledby="dropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dropLabel">Suppression d'utilisateurs <i class="fa-solid fa-triangle-exclamation text-danger"></i> </h5>
          <button class="btn-close" type="button"  data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
        <p>Êtes vous sur de vouloir supprimer cet utilisateur ?</p>
          
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-danger" onclick="deleteUser()" type="button">Delete</button></form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/profil.js" defer></script>
          
    
