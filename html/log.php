
<?php
    include 'includes/verifRoleAdmin.php';
    include 'includes/logVerif.php';
    $actual_page = 'log.php';
    include 'includes/bodyDash.php';
    
?>


     <div class="bg-gray-200 text-sm">
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 py-3">
              <li class="breadcrumb-item"><a class="fw-light" href="dash.php">Home</a></li>
              <li class="breadcrumb-item active fw-light" aria-current="page">Logs  </li>
            </ol>
          </nav>
        </div>
      </div>

<title>Page Administrateur</title>

<div class="container">
  <div class="mt-5 pt-4">
  <h2>Log utilisateurs :</h2>
    <div class="scrollable">

      <table class="table text-center">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Mail</th>
            <th scope="col">Page</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody>

          <?php  
            for($i = 0; $i < count($log); $i++){
              echo '<tr>
              <th scope="row">' . $log[$i]["idLog"] . '</th>
              <td>' . $log[$i]["usersEmail"] . '</td>
              <td>' . $log[$i]["pageName"] . '</td>
              <td>' . $log[$i]["dateLog"] . '</td>
            </tr>';

            }
          ?>
          </tbody>
      </div>
    </div>
</div>      
