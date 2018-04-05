<?php

include("../controller/agenceController.php");

if($_POST) 
{ 
  addAgenceCtrl();
} 


?>


<div id="page-content-wrapper">
    <div class="container-fluid">

  <form action="" method="POST">
  <div class="form-group">
    <label for="nom_ag">Nom:</label>
    <input type="text" name="nom_ag" class="form-control" id="nom_ag">
  </div>
  <div class="form-group">
    <label for="adresse_ag">Adresse:</label>
    <input type="text" name="adresse_ag" class="form-control" id="adresse_ag">
  </div>
  <div class="form-group">
    <label for="email_ag">email:</label>
    <input type="email" name="email_ag" class="form-control" id="email_ag">
  </div>
  <div class="form-group">
    <label for="representant">Representant:</label>
    <input type="text" name="representant" class="form-control" id="representant">
  </div>
  <div class="form-group">
    <label for="ville_ag">Ville:</label>
    <input type="text" name="ville_ag" class="form-control" id="ville_ag">
  </div>
  <div class="form-group">
    <label for="cp_ag">Code Postale:</label>
    <input type="text" name="cp_ag" class="form-control" id="cp_ag">
  </div>
  <div class="form-group">
    <label for="tel_ag">TeL:</label>
    <input type="number" name="tel_ag" class="form-control" id="tel_ag">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>


    <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Afficher le menu</a>
  </div>
</div>
