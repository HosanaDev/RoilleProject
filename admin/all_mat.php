<?php

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