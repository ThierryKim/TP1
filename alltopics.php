<?php
include("header.php");

if (isset($_POST['supprimer'])) {
    $req = $bdd->query('DELETE FROM liste_topics ');
    echo 'Toutes les données ont été supprimées';
} else {
    $req = $bdd->query('SELECT * FROM liste_topics');

    echo '<ul>';
    while ($donnees = $req->fetch()) {
        echo '<li> <a href="topic.php?id=' . $donnees['id_topic'] . '">Titre du topic : ' . $donnees['nom_topic'] . '</a><br/> Auteur : ' . $donnees['auteur'] . '<br/> Date : ' . $donnees['date_creation'] . '</li><br/>';
    }
    echo '</ul>';
    $req->closeCursor();

    ?>
    <form action=alltopics.php method="post" xmlns="http://www.w3.org/1999/html">
        Supprimer tous les topics ?<br/><br/>
        <input type="submit" value="Supprimer" name="supprimer"><br/><br/>
    </form>
    <?php
}

include("footer.php");
?>