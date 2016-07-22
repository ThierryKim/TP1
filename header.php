<?php
session_start();
try {

    $bdd = new PDO('mysql:host=localhost;dbname=tp1;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));;
} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());
}

$today = date("Y-m-d H:i:s");
header('Content-Type: text/html; charset=utf-8');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"/>
    <title>Page d'accueil</title>
</head>
<body>
<a href="index.php">Index</a><br/><br/>
