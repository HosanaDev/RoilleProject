<!-- Inclure un formulaire -->

<?php
		include("inc/db.php");
		if(isset($_POST['add_mat']))
		{
			$cat_name = $_POST['cat_name'];
			$add_cat = $con -> prepare("INSERT INTO clients(nom_cli)values('$cat_name');");

			if($add_cat -> execute())
			{
				echo "SUCCESS";
			}
			else
			{
				echo "FAILED";
			}

		}
?>