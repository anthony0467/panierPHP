<?php
session_start(); 

if(isset($_POST['submit'])){ // verifier s'il y a une cle submit
 $name= filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING); // sécurité filtre les champs
 $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
 $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

 if($name && $price && $qtt){ // verifier si les filtres ont fonctionné
    $product = [
        "name" => $name,
        "price" => $price,
        "qtt" => $qtt,
        "total" => $price * $qtt
    ];

    // enregistré le tableau product
    $_SESSION['products'][] = $product;
 }
}

header("location:index.php"); // redirection
?>