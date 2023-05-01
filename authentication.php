<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'magazinelectronice';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Nu se poate conecta la MySQL: ' . mysqli_Connect_error());
}
if (!isset($_POST['username'], $_POST['password'])) {
    exit('Completati numele de utilizator si parola!');
}
if ($stmt = $con->prepare('SELECT id, password FROM utilizatori WHERE username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        if (password_verify($_POST['password'], $password)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            if($_SESSION['name'] == "admin") {
                header('Location: Admin\view.php');
            } else {
                echo 'Bine ati venit' . $_SESSION['name'] . '!';
                header('Location: shop.php');
            }
        } else {
            echo 'Nume de utilizator sau parola incorecta!';
        }
    } else {
        echo 'Nume de utilizator sau parola incorecta!';
    }
    $stmt -> close();
}
?>