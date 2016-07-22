<?php
include("header.php");
$i = 1;
if (isset($_POST['supprimer'])) {
    $req = $bdd->query('DELETE FROM liste_users ');
    echo 'Toutes les données ont été supprimées';
} else {
    $req = $bdd->query('SELECT * FROM liste_users');

    echo '<ul>';
    while ($donnees = $req->fetch()) {
        echo '<li> Nom user n°' . $i . ' : ' . $donnees['pseudo'] . '</a><br/></li><br/>';
        $i++;
    }
    echo '</ul>';
    $req->closeCursor();

    ?>
    <form action=allusers.php method="post" xmlns="http://www.w3.org/1999/html">
        Supprimer tous les users ?<br/><br/>
        <input type="submit" value="Supprimer" name="supprimer"><br/><br/>
    </form>
    <?php
}

include("footer.php");
?>