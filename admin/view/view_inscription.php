<?php

require("inc/init.inc.php");
$page .= "Inscription";

require("inc/header.inc.php");

if(userConnecte()){
    header("location:index.php");
}


if($_POST){

    debug($_POST);

    $verif_carac = preg_match("#^[a-zA-Z0-9._-]+$#", $_POST["pseudo"]);

    if(!empty($_POST["pseudo"])){
        if($verif_carac){
            if(strlen($_POST["pseudo"]) < 3 || strlen($_POST["pseudo"]) > 20){
                $msg .= '<div class="erreur">Veuillez renseigner un pseudo compris entre 3 et 20 caractères !</div>';
            }
        }
        else {
            $msg .= '<div class="erreur">Certains caractères ne sont pas autorisés, veuillez utiliser les caractères suivants : a-z, A-Z, 0-9 et "-", ".", "_".</div>';
        }
    }
    else {
        $msg .= '<div class="erreur">Veuillez renseigner un pseudo !</div>';
    }

    if(empty($_POST["mdp"])){
        $msg .= '<div class="erreur">Veuillez renseigner un mot de passe !</div>';
    }

    if(empty($_POST["nom"])){
        $msg .= '<div class="erreur">Veuillez renseigner votre Nom !</div>';
    }

    if(empty($_POST["prenom"])){
        $msg .= '<div class="erreur">Veuillez renseigner votre Prénom !</div>';
    }

    if(empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $msg .= '<div class="erreur">Veuillez renseigner un email valide !</div>';
    }


    if(empty($msg)){


        $resultat = $pdo -> prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
        $resultat -> bindParam(":pseudo", $_POST["pseudo"], PDO::PARAM_STR);
        $resultat -> execute();

        if($resultat -> rowCount() > 0){
            $msg .= '<div class="erreur">Le pseudo <b>' . $_POST["pseudo"] . '</b> n\'est pas disponible ! Veuillez choisir un autre pseudo</div>';
        }
        else {

            $resultat = $pdo -> prepare("INSERT INTO membre(pseudo, mdp, nom, prenom, email, civilite, statut, date_enregistrement)
                                        VALUES(:pseudo, :mdp, :nom, :prenom, :email, :civilite, 0, now())");

            $resultat -> bindParam(":pseudo", $_POST["pseudo"], PDO::PARAM_STR);
            $mdp = md5($_POST["mdp"]);
            $resultat -> bindParam(":mdp", $mdp, PDO::PARAM_STR);
            $resultat -> bindParam(":nom", $_POST["nom"], PDO::PARAM_STR);
            $resultat -> bindParam(":prenom", $_POST["prenom"], PDO::PARAM_STR);
            $resultat -> bindParam(":email", $_POST["email"], PDO::PARAM_STR);
            $resultat -> bindParam(":civilite", $_POST["civilite"], PDO::PARAM_STR);

            if($resultat -> execute()){
                header("location:connexion.php?success=1");
            }
        }

    }


}


$pseudo = (isset($_POST['pseudo'])) ? $_POST['pseudo'] : '';
$nom = (isset($_POST['nom'])) ? $_POST['nom'] : '';
$mdp = (isset($_POST['mdp'])) ? $_POST['mdp'] : '';
$prenom = (isset($_POST['prenom'])) ? $_POST['prenom'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$civilite = (isset($_POST['civilite'])) ? $_POST['civilite'] : '';


?>






<div class="container">

    <h1>Inscription</h1><br/>
    <?= $msg ?>

    <br/>
    <form action="" method="post">

            <div class="form-group">

                <label>Pseudo :</label>
                <input class="form-control" type="text" name="pseudo" value="<?= $pseudo ?>"/><br/><br/>

                <label>Mot de passe :</label>
                <input class="form-control" type="password" name="mdp" value="<?= $mdp ?>"/><br/><br/>

                <label>Nom :</label>
                <input class="form-control" type="text" name="nom" value="<?= $nom ?>"/><br/><br/>

                <label>Prénom :</label>
                <input class="form-control" type="text" name="prenom" value="<?= $prenom ?>"/><br/><br/>

                <label>Email :</label>
                <input class="form-control" type="text" name="email" value="<?= $email ?>"/><br/><br/>

                <label>Civilité :</label>
                <select class="form-control" name="civilite">
                    <option <?= ($civilite == 'm') ? 'selected' : '' ?> value="m">Homme</option>
                    <option <?= ($civilite == 'f') ? 'selected' : '' ?> value="f">Femme</option>
                </select><br/><br/><br/>

                <input class="form-control btn btn-primary" type="submit" value="Inscription"><br/><br/>

            </div>

    </form>

</div>





<div class="container">

<?php

require("inc/footer.inc.php");

?>

</div>
