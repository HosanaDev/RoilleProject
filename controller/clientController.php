<?php

include("../model/clientModel.php");

function addClientCtrl()
{
	    // VERIFICATION QUE LES CHAMPS NE SONT PAS VIDE
    if (!empty($_POST["code_ag"]) && !empty($_POST["nom_cli"]) && !empty($_POST["prenom_cli"]) && 
        !empty($_POST["mdp_cli"]) && !empty($_POST["adresse_cli"]) && !empty($_POST["cp_cli"]) && 
        !empty($_POST["email_cli"] && !empty($_POST["ville_cli"] && !empty($_POST["tel_cli"]))  
    {

    // VERIFICAITON SI LES CHAMPS SONT EN PLACE
      if (isset($_POST["code_ag"]) && isset($_POST["nom_cli"]) && isset($_POST["prenom_cli"]) && 
          isset($_POST["mdp_cli"]) && isset($_POST["adresse_cli"]) && isset($_POST["cp_cli"]) &&
          isset($_POST["email_cli"] && isset($_POST["ville_cli"] && isset($_POST["tel_cli"])) 
      {
      	  // APPEL DE LA FONCTION d'INSERTION D'AGENCE
      	  addClientMdl(); 

      } // Fin isset() .. // 

  	} // Fin !empty() .. //

} // FIN addAgenceCtrl //

?>		