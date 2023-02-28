<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

	<title>Ajout produit</title>
</head>

<body>

	<?php include 'menu.php';
	session_start();

	$message2 = (isset($_SESSION['message'])) ? $_SESSION['message'] : null; // si message existe, message sinon null
	echo $message2;
	unset($_SESSION['message']); // enlever le message quand on change de page ou on recharge


	?>

	<h1> Ajouter un produit</h1>
	<form action="traitement.php?action=add" method="post">
		<p>
			<label class="col-form-label">
				Nom du produit:
				<input class="form-control" type="text" name="name">
			</label>
		</p>
		<p>
			<label class="col-form-label">
				Prix du produit:
				<input class="form-control" type="number" step="any" name="price" min="0.5">
			</label>
		</p>
		<p>
			<label class="col-form-label">
				Quantité désirée:
				<input class="form-control" type="number" name="qtt" value="1" min="1">
			</label>
		</p>
		<p>
		<button type="button" class="btn btn-success"><input class="btn" type="submit" name="submit" value="Ajouter le produit"></button>
		</p>

	</form>

	<div><button type="button" class="btn btn-danger"><a class="btn" href="traitement.php?action=deleteAll">Vider le panier</a></button></div>




	<?php

	include('functions.php');

	$quantiteTotal = 0; // variable de quantité initialisé à 0
	echo  qttTotal($quantiteTotal); // fonction quantité total de produit


	//var_dump($_SESSION);



	?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>

</html>