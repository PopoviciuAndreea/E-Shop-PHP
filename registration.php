<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = "";
$DATABASE_NAME = 'magazinelectronice';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Nu se poate conecta la MySQL: ' . mysqli_connect_error());
}
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    exit('Completare formular de inregistrare!');
}
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
    exit('Trebuie sa completati formularul de inregistrare');
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    exit('Adresa de Email nu este valida!');
}
if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
    exit('Numele de utilizator nu este valid!');
}
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
    exit('Parola trebuie sa contina intre 5 si 20 de caractere!');
}
if ($stmt = $con->prepare('SELECT id, password FROM utilizatori WHERE username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo 'Numele de utilizator exista deja, va rugam sa alegeti altul!';
    } else {
        if (
            $stmt = $con->prepare('INSERT INTO utilizatori (username, password, email) VALUES (?, ?, ?)')
        ) {
            $password = password_hash(
                $_POST['password'],
            PASSWORD_DEFAULT
            );
            $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
            $stmt->execute();

            if (
                $stmt = $con->prepare('INSERT INTO clienti (client_username, client_password, client_email, 
                client_str, client_oras, client_tara, client_codpost, client_nrcard, client_tipcard, 
                client_dataexp, client_nume) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')
            ) {
                $password = password_hash(
                    $_POST['password'],
                    PASSWORD_DEFAULT
                );
                $stmt->bind_param('sssssssssss', $_POST['username'], $password, $_POST['email'], $_POST['client_str'], $_POST['client_oras'],
                $_POST['client_tara'], $_POST['client_codpost'], $_POST['client_nrcard'], $_POST['client_tipcard'], $_POST['client_dataexp'], $_POST['client_nume']);
                $stmt->execute();
            }

            echo 'Inregistrat cu succes!';
            header('Location: index.html');
        } else {
            echo 'Nu se poate face prepare statement!';
        }
    }
    $stmt->close();
} else {
    echo 'Nu se poate face prepare statement!';
}
$con->close();
?>