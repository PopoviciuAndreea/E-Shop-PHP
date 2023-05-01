<?php 
    include("../Connect.php");
    $error ='';
    if(!empty($_POST['client_id'])) {
        if(isset($_POST['submit'])) {
            if(is_numeric($_POST['client_id'])) {

                $client_id = $_POST['client_id'];
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

                if($username=='' || $parola=='' || $email=='' || $strada=='' || $oras=='' || $tara=='' || $codpost=='' || $nrcard=='' || $tipcard=='' || 
                   $dataexp=='' || $numa='') {
                    echo "<div> ERROR: Completati campurile obligatorii!</div>";
                } else {
                    if($stmt = $mysqli -> prepare("UPDATE clienti SET client_username=?, client_password=?, client_email=?, client_str=?, client_oras=?, client_tara=?, client_codpost=?, client_nrcard=?, 
                       client_tipcard=?, client_dataexp=?, client_nume=? WHERE client_id='".$client_id."'")) {
                        $stmt -> bind_param("sssssssssss", $username, $parola, $email, $strada, $oras, $tara, $codpost, $nrcard, $tipcard, $dataexp, $nume);
                        $stmt -> execute();
                        $stmt -> close();
                    } else {
                        echo "ERROR: Nu se poate executa modificarea"; 
                    }
                }
            } else {
                echo "id incorect!";
            }
        }
    }
?>
<html>
    <head>
        <title>
            <?php if($_GET['client_id'] != '') {
                echo "Modificare inregistrare";
            } ?>
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
    </head>
    <body>
        <h1> <?php if($_GET['client_id'] != '') {
            echo "Modificare inregistrare";
            } ?>
        </h1>

        <?php if($error != '') {
            echo "<div style='padding:4px; border:1px solid red; color:red'>".$error."</div>";
        } ?>

        <form action="" method="POST">
            <div>
                <?php if($_GET['client_id'] != '') { ?>
                    <input type="hidden" name="client_id" value="<?php echo $_GET['client_id']; ?>"/>
                    <p> ID: <?php echo $_GET['client_id'];
                    if($result = $mysqli -> query("SELECT * FROM clienti WHERE client_id = '".$_GET['client_id']."'")) {
                        if($result -> num_rows > 0) {
                            $row = $result -> fetch_object(); ?></p>
                            <strong>Username: </strong> <input type="text" name="username" value="<?php echo $row->client_username;?>"/><br/>
                            <strong>Parola: </strong> <input type="text" name="parola" value="<?php echo $row->client_password;?>"/><br/>
                            <strong>Email: </strong> <input type="text" name="email" value="<?php echo $row->client_email;?>"/><br/>
                            <strong>Strada: </strong> <input type="text" name="strada" value="<?php echo $row->client_str;?>"/><br/>
                            <strong>Oras: </strong> <input type="text" name="oras" value="<?php echo $row->client_oras;?>"/><br/>
                            <strong>Tara: </strong> <input type="text" name="tara" value="<?php echo $row->client_tara;?>"/><br/>
                            <strong>Cod postal: </strong> <input type="text" name="codpost" value="<?php echo $row->client_codpost;?>"/><br/>
                            <strong>Numar card: </strong> <input type="text" name="nrcard" value="<?php echo $row->client_nrcard;?>"/><br/>
                            <strong>Tip card: </strong> <input type="text" name="tipcard" value="<?php echo $row->client_tipcard;?>"/><br/>
                            <strong>Data expirare: </strong> <input type="text" name="dataexp" value="<?php echo $row->client_dataexp;?>"/><br/>
                            <strong>Nume: </strong> <input type="text" name="nume" value="<?php echo $row->client_nume;?>"/><br/>
                            <?php
                        }
                    }
                }?><br/>
                <input type="submit" name="submit" value="Submit"/>
                <a href="View.php">Index</a>
            </div>
        </form>
    </body>
</html>