<?php
include 'data/Search.php';

$research = new Search;

session_start();
if(isset($_POST['login'])){
    $_SESSION['user'] = $_REQUEST['user'];
}

if ($_SESSION['allMarket'] == null) {
    $_SESSION['allMarket'] = "Paris";
}

if (isset($_POST['setup'])) {
    $_SESSION['allMarket'] = $_REQUEST['allMarkets'];
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de données des Appels d'offres</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="inc/style.css" crossorigin="anonymous">
</head>

<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <div>
                <h6 style="text-align: center; color:white;"><?= $_SESSION['user']?></h6>
            </div>
            <li class="sidebar-brand">
                <a href="./index.php">Accueil</a>
            </li>
            <li>
                <a href="./allusers.php">Liste des appels d'offres</a>
            </li>
            <li>
                <a href="./getuser.php">Rechercher un appel d'offre</a>
            </li>
            <li>
                <a href="./config.php">Configuration</a>
            </li>
            <li style="margin-top: 30px;">
                <form action="getmarket.php" method="POST">
                    <input name="offerToSearch" class="form-control" type="text" placeholder="<?= (isset($_POST['offerToSearch'])) ? $_POST['offerToSearch'] : "Taper votre ID ici"; ?>">
                    <div style="margin-left: 10%; margin-top: 10px;">
                        <button type="submit" name="submit" class="btn btn-primary btn_submit">Rechercher par ID</button>
                    </div>
                </form>
            </li>

        </ul>
    </div>
    <!-- /#sidebar-wrapper -->