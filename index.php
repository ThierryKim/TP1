<?php
include("header.php");

if (isset($_SESSION['pseudo']))
    echo '<p></p><h1>Bienvenue ' . $_SESSION['pseudo'] . ' </h1 > ';
else
    echo '<h1> Bienvenue</h1>';


?>
    <a href="alltopics.php">Accéder à la liste des topics ! </a> <br/><br/>
    <a href="allusers.php">Accéder à la liste des users ! </a> <br/><br/>

<?php

if (!isset($_SESSION['pseudo'])) {
    echo '<a href="connexion.php">Connexion </a><br/><br/>';
    echo '<a href="inscription.php">Inscription </a><br/><br/>';
} else {
    echo '<a href="newtopic.php">Créer un nouveau topic ! </a> <br/><br/>';
    echo '<a href="deconnexion.php">Deconnexion ! </a>';
}

include("footer.php");
?>