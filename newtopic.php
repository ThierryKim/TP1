<?php
include("header.php");


if (!isset($_POST['nom_topic']) && !isset($_POST['contenu_topic'])) {
    ?>
    <h1>Ajout d'un topic</h1>
    <form method="post" action="newtopic.php">
        Titre du topic : <input type="text" name="nom_topic"><br/>
        Contenu du topic : <br/><textarea name="contenu_topic" rows="10" cols="50"> </textarea><br/>
        <input type="submit" value="Valider"/>
    </form>

    <?php
} else {
    if ($_POST['nom_topic'] == null OR $_POST['contenu_topic'] == null) {
        echo '<h1>Nom/Contenu topic Vide !</h1>';
        echo '<a href="newtopic.php"><h2>Recommencer</h2></a> ';

    } else {
        $req = $bdd->prepare('insert into liste_topics values (null, :nom_topic, :auteur, :message_topic, :date_inscription)');
        $req->execute(array(
            'nom_topic' => $_POST['nom_topic'],
            'auteur' => $_SESSION['pseudo'],
            'message_topic' => $_POST['contenu_topic'],
            'date_inscription' => $today

        ))
        ?>
        <h1>Création du topic OK !</h1>

        <?php
    }
}

include("footer.php");
?>