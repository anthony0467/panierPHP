<?php

//session_start();

function qttTotal($total) // fonction pour avoir la quantité total des produit
{
	if (empty($_SESSION['products'])) {
		echo '<p style="text-align: center;">Aucun produit dans le panier</p>';
	} else {
		foreach ($_SESSION['products'] as $index => $product) {
			$total += $product['qtt'];
		}
		return "<p style='text-align: center; margin-top: 1rem;'>Nombre de produits dans le panier: <strong>" . $total . "</strong></p";
	}
}

