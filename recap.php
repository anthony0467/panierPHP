

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>Récapitulatif des produits</title>
</head>

<body>

	<?php
	session_start();

	if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
		echo "<p style='text-align: center;
		font-size: 25px;'>Aucun produit en session...</p>";
	} else {
		echo "<table class='table container'>",
		"<thead>",
		"<tr >",
		"<th scope='col'>#</th>",
		"<th scope='col'>Nom</th>",
		"<th scope='col'>Prix</th>",
		"<th scope='col'>Quantité</th>",
		"<th scope='col'>Total</th>",
		"<th scope='col'>Supprimer un produit</th>",
		"</tr>",
		"</thead>",
		"<tbody>";
		$totalGeneral = 0;
		$quantiteTotal = 0;
		foreach ($_SESSION['products'] as $index => $product) {
			echo "<tr>",
			"<td scope='row'>" . $index . "</td>",
			"<td>" . $product['name'] . "</td>",
			"<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>", //number_format( variable à modifier, nombre de décimales souhaité, caractère séparateur décimal, caractère séparateur de milliers5
			"<td ><a class='marg' href='traitement.php?action=decrementQtt&id=".$index."'>-</a>" . $product['qtt'] . "<a class='marg' href='traitement.php?action=incrementQtt&id=".$index."'>+</a></td>",
			"<td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
			"<td><button type='button' class='btn btn-danger'><a class='btn' href='traitement.php?action=deleteOneProduct&id=" . $index . "'>Supprimer</a></button></td>",
			"</tr>";
			$totalGeneral += $product['total'];
			$quantiteTotal += $product['qtt'];
		}

		//var_dump($_SESSION['products']);

		//echo "Quantité : " . $_SESSION['product']['qtt'];
		//var_dump($_SESSION);
		echo "<tr>",
		"<td colspan=4>Total général: </td>",
		"<td><strong>" . number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;€</strong></td>",
		"</tr>",
		"</tbody",
		"</table><br>";

		//var_dump($_SESSION['alert']);
		

		echo "<p style='text-align: center; margin-top: 1rem;'>Nombre de produits dans le panier: <strong>" . $quantiteTotal . "</strong></p<br>";

		$alert = (isset($_SESSION['alert'])) ? $_SESSION['alert'] : null; // si alert existe, alert sinon null
		echo $alert;
		unset($_SESSION['alert']); // enlever l'alerte quand on change de page ou on recharge
	}
	?>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>