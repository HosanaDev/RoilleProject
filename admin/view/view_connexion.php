<?php


require_once('inc/init.inc.php');


if(isset($_GET['success']) && $_GET['success'] == '1') {

    echo "<div class='container pulse' style='color: white; background: green; text-align:center; border-radius:5px; padding: 50px; font-weight: bold; margin-bottom: 30px;'>Inscription effectuée avec succès !</div>";

}

if(isset($_GET['action']) && $_GET['action'] == 'deconnexion') {

    unset($_SESSION['membre']);
    header('location:connexion.php');

}



if($_POST){


    $resultat = $pdo -> prepare("SELECT * FROM admin WHERE pseudo = :pseudo");
    $resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $resultat -> execute();

    if ($resultat -> rowCount () > 0) {

        $mdp = md5($_POST['mdp']);

        $membre = $resultat -> fetch(PDO::FETCH_ASSOC);

        if($membre['mdp'] == $mdp) {
            foreach ($membre as $indice => $valeur){
                $_SESSION['membre'][$indice] = $valeur;
            }
        header('location:profil.php');
        }
        else {
            $msg.= '<div class="erreur"> Erreur de mot de passe ! </div>';
        }
    }
    else {
        $msg.= "<div class='erreur'> Ce pseudo n'existe pas !</div>";
    }
}



$page .= 'Connexion';

require_once('inc/header.inc.php');

?>


    <div class="container">

        <h1>CONNEXION</h1><br/>
        <?= $msg ?>
        <br/>
            <form action="" method="post">

                <div class="form-group">

                    <label>Pseudo</label>
                    <input class="form-control" type="" name="pseudo"><br/><br/>

                    <label>Mot de passe : </label>
                    <input class="form-control" type="password" name="mdp"><br/><br/><br/>

                    <input class="form-control btn btn-primary"type="submit" value="Connexion"><br/><br/>

                </div>

            </form>

    </div>



<div class="container">

<?php

require_once('inc/footer.inc.php');

?>

</div>
