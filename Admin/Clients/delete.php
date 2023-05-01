<?php 
    include("../Connect.php");
    if(isset($_GET['client_id']) && is_numeric($_GET['client_id'])) {
        $client_id = $_GET['client_id'];
        if($stmt = $mysqli -> prepare("DELETE FROM clienti WHERE client_id =? LIMIT 1")) {
            $stmt -> bind_param("i", $client_id);
            $stmt -> execute();
            $stmt -> close();
        } else {
            echo "ERROR: Nu se poate executa stergerea";
        }
        $mysqli -> close();
        echo "<div> Inregistrarea a fost stearsa!!</div>";
    }
    echo "<p><a href=\"View.php\">Index</a></p>";
?>