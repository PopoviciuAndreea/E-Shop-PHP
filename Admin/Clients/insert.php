<?php 
     include("../Connect.php");
     $error = '';
     if(isset($_POST['submit'])) {
        $username = htmlentities($_POST['username'], ENT_QUOTES);
        $parola = htmlentities($_POST['parola'], ENT_QUOTES);
        $email = htmlentities($_POST['email'], ENT_QUOTES);
        $strada = htmlentities($_POST['strada'], ENT_QUOTES);
        $oras = htmlentities($_POST['oras'], ENT_QUOTES);
        $tara = htmlentities($_POST['tara'], ENT_QUOTES);
        $codpost = htmlentities($_POST['codpost'], ENT_QUOTES);
        $nrcard = htmlentities($_POST['nrcard'], ENT_QUOTES);
        $tipcard = htmlentities($_POST['tipcard'], ENT_QUOTES);
        $dataexp = htmlentities($_POST['dataexp'], ENT_QUOTES);
        $nume = htmlentities($_POST['nume'], ENT_QUOTES);

        if($username== '' || $parola=='' || $email=='' || $strada=='' || $oras=='' || $tara=='' || $codpost=='' || $nrcard=='' || $tipcard=='' ||
           $dataexp=='' || $nume=='') {
            $error = 'ERROR: Campuri goale!';
        } else {
            if($stmt = $mysqli -> prepare("INSERT INTO clienti (client_username, client_password, client_email, client_str, 
            client_oras, client_tara, client_codpost, client_nrcard, client_tipcard, client_dataexp, client_nume) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
                $stmt -> bind_param("sssssssssss", $username, $parola, $email, $strada, $oras, $tara, $codpost, $nrcard, $tipcard, $dataexp, $nume);
                $stmt -> execute();
                $stmt -> close();
            } else {
                echo "ERROR: Nu se poate executa inserarea";
            }
        }
     }
    $mysqli -> close();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title> 
            <?php echo "Inserare inregistrare"; ?>
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <body>
        <h1> 
            <?php echo "Inserare inregistrare"; ?>
        </h1>
        <?php if($error != '') {
            echo "<div style='padding:4px; border:1px solid red; color:red'>".$error."</div>";
        } ?>

        <form action="" method="POST">
            <div>
                <strong>Username: </strong> <input type="text" name="username" value=""/><br/>
                <strong>Parola: </strong> <input type="text" name="parola" value=""/><br/>
                <strong>Email: </strong> <input type="text" name="email" value=""/><br/>
                <strong>Strada: </strong> <input type="text" name="strada" value=""/><br/>
                <strong>Oras: </strong> <input type="text" name="oras" value=""/><br/>
                <strong>Tara: </strong> <input type="text" name="tara" value=""/><br/>
                <strong>Cod postal: </strong> <input type="text" name="codpost" value=""/><br/>
                <strong>Numar card: </strong> <input type="text" name="nrcard" value=""/><br/>
                <strong>Tip card: </strong> <input type="text" name="tipcard" value=""/><br/>
                <strong>Data expirare: </strong> <input type="text" name="dataexp" value=""/><br/>
                <strong>Nume: </strong> <input type="text" name="nume" value=""/><br/>
                <br/>
                <input type="submit" name="submit" value="Submit" />
                <a href = "View.php">Index</a>
            </div>
        </form>
    </body>
</html>