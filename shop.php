<?php
require_once "ShoppingCart.php";
include "config.php";
?>

<html>

<head>
    <title> <?php echo $lang['titlu'] ?> </title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <div id="product-grid">
        <div class="txt-heading">
        <h3> <?php echo $lang['nume'] ?> </h3>
            <div class="menu">
            <ul>
                <li> <a class="menu-item" href="shop.php" id="magazin"> <?php echo $lang['magazin'] ?> </a> </li>
                <li> <a class="menu-item" href="home.php"> <?php echo $lang['acasa'] ?> </a> </li>
                <li> <a class="menu-item" href="shop.php?lang=RO"> RO </a> </li>
                <li> <a class="menu-item" href="shop.php?lang=EN"> EN </a> </li>
                <li> <a class="menu-item" href="cart.php" id="cos"> <?php echo $lang['cos'] ?> </a> </li>
                <li> <a class="menu-item" href="logout.php" id="logout"> <?php echo $lang['deconectare'] ?> </a> </li>
            </ul>
            </div>
            <br><br>
            <div class="txt-heading-label"> Produse </div>
        </div>
        <?php
        $shoppingCart = new ShoppingCart();
        $query = "SELECT * FROM produse";
        $product_array = $shoppingCart->getAllProduct();

        if (!empty($product_array)) {
            foreach ($product_array as $key => $value) {
        ?>
        <div class="product-item">
        <form method="post" action="cart.php?action=add&code=<?php echo $product_array[$key]["produs_cod"]; ?>">
                <div class="product-image">
                    <img src="<?php echo $product_array[$key]["produs_img"]; ?>" width="260" height="200">
                </div>

                <div>
                    <strong>
                        <?php echo $product_array[$key]["produs_nume"]; ?>
                    </strong>
                </div>

                <div>
                    <?php echo $product_array[$key]["produs_descriere"]; ?>
                </div>

                <div class="product-price">
                    <?php echo $product_array[$key]["produs_pret"]. " ".$lang['pret']; ?>
                </div>

                <div>
                    <input type="text" name="cantitate" value="1" size="2" />
                    <input type="submit" value= "<?php echo $lang['adauga'] ?>" class="btnAddAction" />
                </div>
        </form>
        </div>
        <?php
            }
        }
            ?>
    </div>
    <footer class = "footer">
        <?php echo $lang['despre'] ?> Magazin electronice <br>
        <?php echo $lang['contact'] ?> Email: magazinElectronice@magazin.com <br>
        Copyright &copy 2023 Magazin Electronice <br>
    </footer>
</body>

</html>