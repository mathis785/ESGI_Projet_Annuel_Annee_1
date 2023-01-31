<?php


$data ="b";

if(isset($_GET['q'])) {
    $data = $_GET['q'];
}

$dB = new mysqli("164.132.55.186", "Admin", "MDP.De.Qualite", "EWHOLE", 3306);

$x = "SELECT product_name, product_categorie FROM producttb WHERE product_name LIKE '%$data%' limit 10;";
$y = $dB->query($x);
$table = [];

while ($z = $y->fetch_assoc()){
    $table[] = $z;
}

if($y) {
    $z = $y->fetch_assoc();

    foreach($table as $z){
        echo "<ul>";
            echo "<li><a href=\"#\"><ion-icon name=\"search-outline\" style=\"margin-right: 7px;\"></ion-icon> " . $z['product_name'] . '</a>' . '  |  ' . '<a href="#" class="catgr">' . $z['product_categorie'] . "</a></li>";
        echo "</ul>";
    }
}
if(empty($table)){
    echo "<ul>";
        echo "<li><a href=\"#\"><ion-icon name=\"search-outline\" style=\"margin-right: 7px;\"></ion-icon> Aucun résultat </a></li>";
    echo "</ul>";
}

?>