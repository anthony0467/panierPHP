<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Récapitulatif des produits</title>
</head>

<body>

	<?php


	if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
		echo "<p style='text-align: center;
		font-size: 25px;'>Aucun produit en session...</p>";
	} else {
		echo "<table>",
		"<thead>",
		"<tr>",
		"<th>#</th>",
		"<th>Nom</th>",
		"<th>Prix</th>",
		"<th>Quantité</th>",
		"<th>Total</th>",
		"<th>Supprimer un produit</th>",
		"</tr>",
		"</thead>",
		"<tbody>";
		$totalGeneral = 0;
		$quantiteTotal = 0;
		foreach ($_SESSION['products'] as $index => $product) {
			echo "<tr>",
			"<td>" . $index . "</td>",
			"<td>" . $product['name'] . "</td>",
			"<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>", //number_format( variable à modifier, nombre de décimales souhaité, caractère séparateur décimal, caractère séparateur de milliers5
			"<td>" . $product['qtt'] . "</td>",
			"<td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
			"<td><div><a class='btn' href='traitement.php?action=deleteOneProduct&retrait=" . $index . "'>Supprimer</a></div></td>",
			"</tr>";
			$totalGeneral += $product['total'];
			$quantiteTotal += $product['qtt'];
		}

		//var_dump($_SESSION['products']);


		echo "<tr>",
		"<td colspan=4>Total général: </td>",
		"<td><strong>" . number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;€</strong></td>",
		"</tr>",
		"</tbody",
		"</table>";



		echo "<p style='text-align: center; margin-top: 1rem;'>Nombre de produits dans le panier: <strong>" . $quantiteTotal . "</strong></p";
	}
	?>
</body>

</html>