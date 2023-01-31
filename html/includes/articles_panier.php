<?php

function component($productname, $productprice, $productimg, $productid){
    $element = "
            <div class=\"col-lg-3 col-md-12 mb-4\">
            <form action=\"index.php\" method=\"post\">
                <div class=\"card h-100\">

                    <div class=\"card-body\">
                        <div class=\"imageproduit\" >
                            <a href=\"#\" style=\"font-size:25px; position: absolute; right: 10px; top: 8px;\"><ion-icon name=\"heart-outline\" title=\"Favoris\" ></ion-icon></a>
                            <div style=\" display: flex; justify-content: center; align-items: center;\"> <img src= $productimg class=\"img-fluid \"> </div>
                        </div>
                    </div>
                    <ul class=\"list-group pt-2 px-2 list-group-flush description\">
                        <li class=\"list-group-item px-1 titre\">
                            <h4> $productname </h4>
                            <h5>le paquet de 1 kg</h5>
                            <h6> $productprice € / KG</h6>
                        </li>
                    </ul>
                    <ul class=\"list-group list-group-flush prix\">
                        <li class=\"list-group-item pt-2 pb-2\">
                            <h4> $productprice €</h4>

                            <button type=\"submit\" class=\"btn\" name=\"add\"><ion-icon name=\"cart-outline\"></ion-icon></button>
                            <input type='hidden' name='product_id' value='$productid'>
                        </li>
                    </ul>
                </div>
                </form>
            </div>
    ";
    echo $element;
}


function cartElement($productimg, $productname, $productprice, $productid){
    $element = "
    
    <form action=\"panier.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">    
    <div class=\"row border-bottom\">
        <div class=\"row main align-items-center\">
            <div class=\"col-2\"><img class=\"img-fluid\" src=\"$productimg\"></div>
            <div class=\"col-4 infos\">
                <h4>$productname</h4>
                <h3>Vendeur vérifié</h3>
            </div>
            <div class=\"col nombre_produits\">
                <button onclick=\"this.parentNode.querySelector('input[type=number]').stepDown()\" class=\"moins\">-</button>
                <input class=\"quantity\" min=\"0\" name=\"quantity\" value=\"1\" type=\"number\">
                <button onclick=\"this.parentNode.querySelector('input[type=number]').stepUp()\" class=\"plus\">+</button>
            </div>                           
            <div class=\"col prix\">
                <h3>$productprice €</h3>                               
                <button type=\"submit\" class=\"fa-solid fa-xmark\" name=\"remove\" ></button>
            </div>
        </div>
    </div></form>
    ";
    echo  $element;
}



?>












