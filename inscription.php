<?php

include("header.php");

if (!isset($_POST['pseudo']) && !isset ($_POST['mot_de_passe'])) {
    ?>
    <h1>Inscription </h1>
    <form method="post" action="inscription.php">
        Nouvel utilisateur : <input type="text" name="pseudo"><br/><br/>
        Mot de passe : <input type="password" name="mot_de_passe"><br/><br/>
        <input type="submit" value="Valider"/>
    </form>

    <?php
} else {
    if ($_POST['pseudo'] == null OR $_POST['mot_de_passe'] == null) {
        echo '<h1>Pseudo/Mdp Vide !</h1>';
        echo '<a href="inscription.php"><h2>Recommencer</h2></a> ';

    } else {
        $password = sha1($_POST['mot_de_passe']);

        $req = $bdd->prepare('insert into liste_users values (null, :pseudo, :motdepasse)');
        $req->execute(array(
            'pseudo' => $_POST['pseudo'],
            'motdepasse' => $password));
        echo '<h1>Inscription OK ! </h1>';
    }
}

include("footer.php");

?>