<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Ajout produit</title>
</head>

<body>

	<?php include 'menu.php'; ?>

	<h1>Ajouter un produit</h1>
	<form action="traitement.php?action=add" method="post">
		<p>
			<label>
				Nom du produit:
				<input type="text" name="name">
			</label>
		</p>
		<p>
			<label>
				Prix du produit:
				<input type="number" step="any" name="price">
			</label>
		</p>
		<p>
			<label>
				Quantité désirée:
				<input type="number" name="qtt" value="1">
			</label>
		</p>
		<p>
			<input type="submit" name="submit" value="Ajouter le produit">
		</p>

	</form>

	<div><a class="btn" href="traitement.php?action=deleteAll">Supprimer tous les produits</a></div>




	<?php
	include('nbProduit.php');
	session_start();

	$quantiteTotal = 0;


	echo "<p style='text-align: center; margin-top: 1rem;'>Nombre de produits dans le panier: <strong>" . qttTotal($quantiteTotal) . "</strong></p";


	?>

</body>

</html>