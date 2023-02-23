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

	<?php include 'menu.php';
	session_start();

	?>

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
			<input class="btn" type="submit" name="submit" value="Ajouter le produit">
		</p>

	</form>

	<div><a class="btn" href="traitement.php?action=deleteAll">Vider le panier</a></div>




	<?php

	include('functions.php');

	$message2 = (isset($_SESSION['message'])) ? $_SESSION['message'] : "<div style='    display: flex;
	justify-content: center;'><p style='color: red; background-color: #fff; border: 1px solid red; text-align: center; padding: 0.5rem 1rem; border-radius: 15px;'> Erreur de saisie</p></div>"; // si message existe, message sinon message erreur
	echo $message2;
	unset($_SESSION['message']); // enlever le message quand on change de page ou on recharge

	$quantiteTotal = 0; // variable de quantité initialisé à 0
	echo  qttTotal($quantiteTotal); // fonction quantité total de produit


	var_dump($_SESSION);



	?>

</body>

</html>