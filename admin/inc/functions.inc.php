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



// Affichage de toutes les materiels

function view_all_mat()
{
	include("inc/db.php");
	$fetch_mat = $con->prepare("SELECT * FROM Materiel;");
	$fetch_mat->setFetchMode(PDO::FETCH_ASSOC);

	if($fetch_mat->execute())
	{
		echo "SUCCESS"; 
	}
	else
	{
		echo "SUCCESS";
	}

	while($row->fetch_mat->fetch());
	{
			echo "<option value='".$row['ref_mat']."'>
					 ".$row['mat_name']." 
				 </option>";
	}
	endwhile;
}
?>