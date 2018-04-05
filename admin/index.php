 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Gestion des données de Roille">
    <meta name="author" content="Jérôme_Youssef_Hosana">

    <title>Interface ADMINISTRATEUR</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
</head>

<body>

<?php
include("inc/body_left.inc.php");
?>
        <!-- Page Content -->

      <div id="page-content-wrapper">
          <div class="container-fluid">
              <h1>Interface Administrateur</h1>
              <p>
                Bienvenue dans l'outil de gestion pour Administrateurs <br/>
                Grâce à cet outil vous pourrez effectuer des opération de CRUD,
                autrement dit vous pourrez gérer les clients, matériels, catégories, commandes...
              </p>
              <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Afficher le menu</a>
          </div>

          
      </div> <!-- Fin page-content-wrapper -->

      
         <?php

            if(isset($_GET['view_agences']))
            {
                include("view/view_agences.php");
            }

            if(isset($_GET['view_create_client']))
            {
                include("view/view_create_client.php");
            }

            if(isset($_GET['view_create_agence']))
            {
                include("view/view_create_agence.php");
            }
        ?>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>


