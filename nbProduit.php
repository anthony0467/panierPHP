<?php

//session_start();

function qttTotal($total)
{

	foreach ($_SESSION['products'] as $index => $product) {
		$total += $product['qtt'];
	}
	return $total;
}
