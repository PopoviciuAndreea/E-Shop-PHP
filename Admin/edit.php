<?php 
    include("Connect.php");
    $error='';
    if(!empty($_POST['produs_id'])) {
        if(isset($_POST['submit'])) {
            if(is_numeric($_POST['produs_id'])) {
                $id = $_POST['produs_id'];
                $nume = htmlentities($_POST['produs_nume'], ENT_QUOTES);
                $cod = htmlentities($_POST['produs_cod'], ENT_QUOTES);
                $pret = htmlentities($_POST['produs_pret'], ENT_QUOTES);
                $imagine = htmlentities($_POST['produs_img'], ENT_QUOTES);
                $categorie = htmlentities($_POST['produs_categorie'], ENT_QUOTES);
                $descriere = htmlentities($_POST['produs_descriere'], ENT_QUOTES);
                $descrierecompl = htmlentities($_POST['produs_desccompl'], ENT_QUOTES);

                if($nume =='' || $cod =='' || $pret =='' || $imagine =='' || $categorie =='' || $descriere =='' || $descrierecompl =='') {
                    echo "<div> ERROR: Completati campurile obligatorii! </div>";
                } else {
                    if($stmt = $mysqli -> prepare("UPDATE produse SET produs_nume=?, produs_cod=?, produs_pret=?, produs_img=?,
                        produs_categorie=?, produs_descriere=?, produs_desccompl=? WHERE produs_id='".$id."'")) {
                            $stmt -> bind_param("ssdssss", $nume, $cod, $pret, $imagine, $categorie, $descriere, $descrierecompl);
                            $stmt -> execute();
                            $stmt -> close();
                    } else {
                        echo "ERROR: Nu se poate executa modificarea";
                    }
                } 
            } else {
                echo "ID incorect!";
            }
        }
    }
?>

<html>
    <head>
        <title> 
            <?php 
                if($_GET['produs_id'] != '') { 
                    echo "Modificare inregistrare"; } 
            ?> 
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>

    <body>
        <h1> 
            <?php 
                if($_GET['produs_id'] != '') {
                    echo "Modificare inregistrare";
                }
            ?>
        </h1>

        <?php 
            if($error != '') {
                echo "<div style = 'padding:4px; border:1px solid red; color:red'>".$error."</div>";
            }
        ?>
        <form action="" method="POST">
            <div>
                <?php 
                    if($_GET['produs_id'] != '') {
                        ?>
                        <input type="hidden" name="produs_id" value="<?php echo $_GET['produs_id']; ?>" />
                        <p> ID: <?php echo $_GET['produs_id'];
                        if($result = $mysqli -> query("SELECT * FROM produse WHERE produs_id='".$_GET['produs_id']."'")) {
                            if($result -> num_rows > 0) {
                                $row = $result -> fetch_object(); ?> </p>

                                <strong> Nume: </strong>
                                <input type="text" name="produs_nume" value="<?php echo $row -> produs_nume; ?>" /> <br/>

                                <strong> Cod: </strong>
                                <input type="text" name="produs_cod" value="<?php echo $row -> produs_cod; ?>" /> <br/>

                                <strong> Pret: </strong>
                                <input type="text" name="produs_pret" value="<?php echo $row -> produs_pret; ?>" /> <br/>

                                <strong> Imagine: </strong>
                                <input type="text" name="produs_img" value="<?php echo $row -> produs_img; ?>" /> <br/>

                                <strong> Categorie: </strong>
                                <input type="text" name="produs_categorie" value="<?php echo $row -> produs_categorie; ?>" /> <br/>

                                <strong> Descriere: </strong>
                                <input type="text" name="produs_descriere" value="<?php echo $row -> produs_descriere; ?>" /> <br/>

                                <strong> Descriere completa: </strong>
                                <input type="text" name="produs_desccompl" value="<?php echo $row -> produs_desccompl; ?>" /> <br/>
                                <?php
                            }
                        }
                } ?>
                <br/>
                <input type="submit" name="submit" value="Submit" />
                <a href = "View.php">Index</a>
            </div>
        </form>
    </body>
</html>

