<?php
    include("Connect.php");
    $error='';
    if(isset($_POST['submit'])) {
        $nume = htmlentities($_POST['produs_nume'], ENT_QUOTES);
        $cod = htmlentities($_POST['produs_cod'], ENT_QUOTES);
        $pret = htmlentities($_POST['produs_pret'], ENT_QUOTES);
        $imagine = htmlentities($_POST['produs_img'], ENT_QUOTES);
        $categorie = htmlentities($_POST['produs_categorie'], ENT_QUOTES);
        $descriere = htmlentities($_POST['produs_descriere'], ENT_QUOTES);
        $descrierecompl = htmlentities($_POST['produs_desccompl'], ENT_QUOTES);

        if($nume =='' || $cod =='' || $pret =='' || $imagine =='' || $categorie =='' || $descriere =='' || $descrierecompl =='') {
            $error = 'ERROR: Campuri goale!';
        } else {
            if($stmt = $mysqli -> prepare("INSERT INTO produse(produs_nume, produs_cod, produs_pret, produs_img, produs_categorie, produs_descriere, produs_desccompl) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
                $stmt -> bind_param("ssdssss", $nume, $cod, $pret, $imagine, $categorie, $descriere, $descrierecompl);
                $stmt -> execute();
                $stmt -> close();
            } else {
                echo "ERROR: Nu se poate executa inserarea.";
            }
        }
    }
    $mysqli -> close();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title> <?php echo "Inserare inregistrare"; ?> </title>
        <meta http-equiv = "Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <h1> <?php echo "Inserare inregistrare"; ?> </h1>
        <?php 
            if($error != '') {
                echo "<div style = 'padding:4px; border:1px solid red; color:red'>".$error."</div>";
            }
        ?>
        <form action = "" method = "POST">
            <div>
                <strong> Nume: </strong>
                    <input type="text" name="produs_nume" value="" /> <br/>
                <strong> Cod: </strong>
                    <input type="text" name="produs_cod" value="" /> <br/>
                <strong> Pret </strong>
                    <input type="text" name="produs_pret" value="" /> <br/>
                <strong> Imagine </strong>
                    <input type="text" name="produs_img" value="" /> <br/>
                <strong> Categorie </strong>
                    <input type="text" name="produs_categorie" value="" /> <br/>
                <strong> Descriere </strong>
                    <input type="text" name="produs_descriere" value="" /> <br/>
                <strong> Descriere completa </strong>
                    <input type="text" name="produs_desccompl" value="" /> <br/>
                <br/>

                <input type="submit" name="submit" value="Submit" />
                <a href="View.php">Index</a>
        </div> 
    </body>
</html>
