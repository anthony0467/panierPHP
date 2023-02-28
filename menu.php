<?php
session_start();

include('functions.php');
$quantiteTotal = 0; 

echo '<nav>',
    '<a href="index.php">Accueil</a>',
    '<a href="contenuRecap.php">Panier</a>',
    '<a class="relative" href="contenuRecap.php">',
        '<i class="fa-solid fa-basket-shopping"></i>',
       '<p class="panier">'.qttTotal($quantiteTotal).'</p>',
    '</a>',
'</nav>';

?>