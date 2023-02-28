<?php

//session_start();

function qttTotal($total) // fonction pour avoir la quantité total des produit
{
	if (empty($_SESSION['products'])) {
		echo '<p class="panier">0</p>';
	} else {
		foreach ($_SESSION['products'] as $index => $product) {
			$total += $product['qtt'];
		}
		return " <strong>" . $total . "</strong>";
	}
}

function calculTotalPrice($price, $quantity){
	return $price * $quantity;
}