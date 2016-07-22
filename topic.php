<?php
include("header.php");

$repertoireimage = "images";

if (!is_dir($repertoireimage)){
mkdir($repertoireimage);
}


$id = $_GET['id'];
$new_url_img = null;
$extentions_autorisees = array('image/jpeg', 'image/png', 'image/gif');
$finfo = finfo_open(FILEINFO_MIME_TYPE);

$req = $bdd->query('SELECT * FROM liste_topics WHERE id_topic=' . $id . ' ');
$donnees = $req->fetch();

if (isset($_POST['supprimer'])) {
    $req = $bdd->query('DELETE FROM liste_messages WHERE id_topic=' . $id . '  ');
    echo 'Toutes les messages du topic ont été supprimées </br>';
}


echo '<a href="alltopics.php">Retourner à la liste des topics</a><br/><br/>';
echo '<h1> Titre topic : ' . $donnees['nom_topic'] . ' </h1>';
echo '<h2> Auteur topic : ' . $donnees['auteur'] . ' </h2>';
echo '<h3> Date création topic : ' . $donnees['date_creation'] . ' </h3>';


echo '<table border="1">';

echo '<tr><td> ' . $donnees['message_topic'] . '</td></tr>';

echo '</table>';
$req->closeCursor();

echo '</br></br><a href=\'topic.php?id=' . $id . '\'><input type="button" value="Rafraîchir"></a></br></br>';

$req = $bdd->query('SELECT * FROM liste_messages where id_topic =' . $id . ' ');
echo '<table border="1">';
while ($donnees = $req->fetch()) {
    $url_img = $donnees['url_img'];

    echo '<tr><td>Auteur</td> <td> ' . $donnees['date_post'] . '</td></tr>';
    echo '<tr><td>' . $donnees['auteur'] . '</td> <td>' . $donnees['message'] . '</td><td><img src=' . $url_img . '></td></tr>';

}
echo '</table> <br/><br/>';


if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0) {
    $infosfichiers = pathinfo($_FILES['monfichier']['name']);
    $mime = finfo_file($finfo, $_FILES['monfichier']['tmp_name']);
    $extentions_upload = $infosfichiers['extension'];
    if (in_array($mime, $extentions_autorisees)) {
        $new_name = pathinfo($_FILES['monfichier']['name'], PATHINFO_FILENAME) . '(' . date("YmdHis") . ')' . '.' . $extentions_upload;
        move_uploaded_file($_FILES['monfichier']['tmp_name'], 'images/' . $new_name);
        echo 'Fichier bien envoyé <br/>';
        $new_url_img = 'images\\' . $new_name;

    } else {
        echo 'Fichier incorrecte !';
    }

}


if (isset($_POST['message'])) {
    $req = $bdd->prepare('insert into liste_messages values (null, :id_topic, :message, :auteur, :datepost, :img_url)');
    $req->execute(array(
        'message' => $_POST['message'],
        'auteur' => $_SESSION['pseudo'],
        'id_topic' => $id,
        'datepost' => $today,
        'img_url' => $new_url_img

    ));
    $req->closeCursor();
}

echo '<form action="topic.php?id=' . $id . '" method="post" xmlns="http://www.w3.org/1999/html">'
?>
    Supprimer tous les messages du topic ?<br/><br/>
    <input type="submit" value="Supprimer" name="supprimer"><br/><br/>
    </form>
<?php

echo '</br>';
echo '<form method="post" action="topic.php?id=' . $id . '" enctype="multipart/form-data">';
$req->closeCursor();


if (isset($_SESSION['pseudo'])) {
    ?>
    Ajouter un message (Publier en tant que <b><?php echo $_SESSION['pseudo']; ?></b>) : </br></br><textarea
        name="message" rows=10 COLS=100> </textarea><br/><br/>
    Envoi de fichier : <input type="file" name="monfichier"/><br/>
    </br><input type="submit" value="Valider"/>

    </form>

    <?php
} else {
    echo '<a href="connexion.php">Connexion !</a><br/><br/>';
}
include("footer.php");
?>