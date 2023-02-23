<?php
// SESSION : Les sessions sont un moyen simple de stocker des données individuelles pour chaque utilisateur en utilisant un identifiant de session unique. Elles peuvent être utilisées pour récuperer entre plusieurs pages. une SESSION est stocké coté serveur.
//COOKIE: Les cookies sont un mécanisme d'enregistrement d'informations sur le client, et de lecture de ces informations. Ce système permet d'identifier et de suivre les visiteurs. Vous pouvez envoyer un cookie avec la fonction setcookie() ou setrawcookie(). on stock coté navigateur.
//SUPERGLOBALE: Plusieurs variables prédéfinies en PHP sont "superglobales", ce qui signifie qu'elles sont disponibles quel que soit le contexte du script. Il est inutile de faire global $variable; avant d'y accéder dans les fonctions ou les méthodes. Les variables superglobales sont : $GLOBALS. (exemple: $_SESSION)
//REQUETE HTTP: Une requête HTTP, acronyme de « Hypertext Transfer Protocol » renvoie au protocole HTTP utilisé par le navigateur web pour consulter un site internet. L'ordinateur de l'internaute, via un navigateur, envoie une requête au serveur web, qui lui apporte alors immédiatement une réponse en affichant la page web demandée.


session_start();

if (isset($_GET['action'])) { // si action est déclaré et différente de NULL // si le mot action se trouve dans l'url

	switch ($_GET['action']) {
		case "add": // appliquer la fonction add 
			if (isset($_POST['submit'])) { // verifier s'il y a une cle submit
				// les filtres permettent de ce prémunir d'une faille XSS (injecter du code HTML et/ou Javascript) dans une variable.
				$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS); // sécurité filtre les champs
				$price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
				$qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);


				if ($name && $price && $qtt) { // verifier si les filtres ont fonctionné
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
			break;
		case "deleteAll":
			unset($_SESSION['products']);
			break;
			
		case 'deleteOneProduct':
			$ref = $_GET['retrait'];
			unset($_SESSION['products'][$ref]);
			header("location:contenuRecap.php"); // redirection           
			die;
			break;
	}
}



header("location:index.php"); // redirection
