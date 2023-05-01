<?php
include("../config.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title> <?php echo $lang['titluAdmin'] ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="styleAdmin.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <h3> <?php echo $lang['nume'] ?> </h3>
        <div class="menu">
            <ul>
                <li> <a class="menu-item" href="Clients/view.php"> <?php echo $lang['adminClienti'] ?> </a> </li>
                <li> <a class="menu-item" href="view.php"> <?php echo $lang['adminProduse'] ?> </a> </li>
                <li> <a class="menu-item" href="../shop.php" id="magazin"> <?php echo $lang['magazin'] ?> </a> </li>
                <li> <a class="menu-item" href="../home.php"> <?php echo $lang['acasa'] ?> </a> </li>
                <li> <a class="menu-item" href="view.php?lang=RO"> RO </a> </li>
                <li> <a class="menu-item" href="view.php?lang=EN"> EN </a> </li>
                <li> <a class="menu-item" href="../cart.php" id="cos"> <?php echo $lang['cos'] ?> </a> </li>
                <li> <a class="menu-item" href="../logout.php" id="logout"> <?php echo $lang['deconectare'] ?> </a> </li>
            </ul>
        </div>
        <h1> <?php echo $lang['produse'] ?> </h1>
        <p> <b> <?php echo $lang['paragrafProduse'] ?> </b></p>

        <?php 
            include("Connect.php");
            if($result = $mysqli -> query("SELECT * FROM produse ORDER BY produs_id")) {
                if($result -> num_rows > 0) {
                    echo "<table border = '1' cellpadding='10'>";
                    echo "<tr>
                            <th>".$lang['id']."</th>
                            <th>".$lang['produsNume']." </th>
                            <th>".$lang['produsCod']." </th>
                            <th>".$lang['produsPret']." </th>
                            <th>".$lang['produsImagine']." </th>
                            <th>".$lang['produsCategorie']." </th>
                            <th>".$lang['produsDescriere']." </th>
                            <th>".$lang['produsDescriereCompl']." </th>
                            <th></th><th></th>
                          </tr>";
                    
                    while($row = $result -> fetch_object()) {
                        echo "<tr>";
                        echo "<td>".$row->produs_id."</td>";
                        echo "<td>".$row->produs_nume."</td>";
                        echo "<td>".$row->produs_cod."</td>";
                        echo "<td>".$row->produs_pret."</td>";
                        echo "<td>".$row->produs_img."</td>";
                        echo "<td>".$row->produs_categorie."</td>";
                        echo "<td>".$row->produs_descriere."</td>";
                        echo "<td>".$row->produs_desccompl."</td>";

                        echo "<td><a href = 'Edit.php?produs_id=".$row->produs_id."'>".$lang['modificare']." </a></td>";
                        echo "<td><a href = 'Delete.php?produs_id=".$row->produs_id."'>".$lang['stergere']."</a></td>";

                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "Nu sunt inregistrari in tabela!";
                }
            } else {
            echo "Error: " . $mysqli->error;
            }
            $mysqli -> close();
            ?>

            <a href = "Insert.php"> <?php echo $lang['inserare'] ?> </a>
            <footer class = "footer">
                <?php echo $lang['despre'] ?> Magazin electronice <br>
                <?php echo $lang['contact'] ?> Email: magazinElectronice@magazin.com <br>
                Copyright &copy 2023 Magazin Electronice <br>
            </footer>
    </body>
</html>