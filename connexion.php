<?php

include("header.php");

$success = false;

if (!isset($_POST['pseudo']) && !isset ($_POST['mot_de_passe'])) {
    ?>
    <h1>Connexion </h1>
    <form method="post" action="connexion.php">
        Pseudo : <input type="text" name="pseudo" value="toto1"><br/><br/>
        Mot de passe : <input type="password" name="mot_de_passe" value="azerazer"><br/><br/>
        <input type="submit" value="Valider"/>
    </form>

    <?php
} else {
    $req = $bdd->query('select pseudo, mot_de_passe from liste_users');
    $password = sha1($_POST['mot_de_passe']);
    while ($donnees = $req->fetch()) {
        if ($donnees['pseudo'] == $_POST['pseudo'] && $donnees['mot_de_passe'] == $password) {
            $_SESSION['pseudo'] = $donnees['pseudo'];
            $success = true;
        }
    }
    if ($success == true) {
        echo '<h1>Connexion OK ! </h1>';
    } else {
        echo '<h1>Mauvais Login/Password </h1></br>';
        echo '<a href=connexion.php>Connexion ! </a>';
    }
}

include("footer.php");

?>