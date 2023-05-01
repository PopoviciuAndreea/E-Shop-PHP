<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
include('config.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> <?php echo $lang['titluAcasa'] ?> </title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body class="loggedin">
    <nav class="navtop">
        <div>
            <h3> <?php echo $lang['nume'] ?> </h3>
            <div class="menu">
            <ul>
                <li> <a class="menu-item" href="shop.php" id="magazin"> <?php echo $lang['magazin'] ?> </a> </li>
                <li> <a class="menu-item" href="home.php"> <?php echo $lang['acasa'] ?> </a> </li>
                <li> <a class="menu-item" href="home.php?lang=RO"> RO </a> </li>
                <li> <a class="menu-item" href="home.php?lang=EN"> EN </a> </li>
                <li> <a class="menu-item" href="cart.php" id="cos"> <?php echo $lang['cos'] ?> </a> </li>
                <li> <a class="menu-item" href="logout.php" id="logout"> <?php echo $lang['deconectare'] ?> </a> </li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="content">
        <h2> <?php echo $lang['mesajHome'] ?> </h2>
        <p> <?php echo $lang['mesajBunVenit'] ?>.<?= $_SESSION['name'] ?> ! </p>
    </div>
    <footer class = "footer">
        <?php echo $lang['despre'] ?> Magazin electronice <br>
        <?php echo $lang['contact'] ?> Email: magazinElectronice@magazin.com <br>
        Copyright &copy 2023 Magazin Electronice <br>
    </footer>
</body>

</html>