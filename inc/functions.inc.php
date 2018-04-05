<?php
// Mettre un include de la connexion à la BDD
//¨Puis la fonction qui opère dans la BDD

if(isset($_POST['add_cat']))
{

	$cat_name = $_POST['cat_name'];
	$add_cat = prepare("INSERT INTO materiels(nom_mat) VALUES('$cat_name');");

	if($add_cat->execute())
	{
		echo "<script>alert('Materiel ajouté avec succès');</script>";
	}
	else
	{
		echo "<script>alert('Materiel n\'a pas été ajouté');</script>";
	}
}
?>