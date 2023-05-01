<?php
require_once "ShoppingCart.php";
session_start();
include "config.php";
if(!isset($_SESSION['loggedin'])) {
    header('Location:  index.html');
    exit;
}
$member_id = $_SESSION['loggedin'];

$shoppingCart = new ShoppingCart();
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            if(!empty($_POST["cantitate"])) {
                $productResult = $shoppingCart->getProductByCode($_GET["code"]);
                $cartResult = $shoppingCart->getCartItemByProduct($productResult[0]["produs_id"], $member_id);

                if(!empty($cartResult)) {
                    $newQuantity = $cartResult[0]["cos_cantitate"] + $_POST["cantitate"];
                    $shoppingCart->updateCartQuantity($newQuantity, $cartResult[0]["cos_id"]);
                } else {
                    $shoppingCart->addToCart($productResult[0]["produs_id"], $_POST["cantitate"], $member_id);
                }
            }
            break;
        case "remove":
            $shoppingCart->deleteCartItem($_GET["produs_id"]);
            break;
        case "empty":
            $shoppingCart->emptyCart($member_id);
            break;
    }
}
?>

<html>
    <head>
        <title> <?php echo $lang['titlu'] ?> </title>
        <link href="style.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <div id="shopping-cart">
            <div class="txt-heading">
            <h3> <?php echo $lang['nume'] ?> </h3>
            <div class="menu">
            <ul>
                <li> <a class="menu-item" href="shop.php" id="magazin"> <?php echo $lang['magazin'] ?> </a> </li>
                <li> <a class="menu-item" href="home.php"> <?php echo $lang['acasa'] ?> </a> </li>
                <li> <a class="menu-item" href="cart.php?lang=RO"> RO </a> </li>
                <li> <a class="menu-item" href="cart.php?lang=EN"> EN </a> </li>
                <li> <a class="menu-item" href="cart.php" id="cos"> <?php echo $lang['cos'] ?> </a> </li>
                <li> <a class="menu-item" href="logout.php" id="logout"> <?php echo $lang['deconectare'] ?> </a> </li>
            </ul>
            </div>
            <br>
                <div class="txt-heading-label"> <?php echo $lang['titluCos'] ?> </div>
                <a id="btnEmpty" href="cart.php?action=empty">
                    <img src="empty-cart.png" alt="empty-cart" title="Empty Cart" width="100" height="40"/>
                </a>
            </div>
            <br>

            <?php 
                $cartItem = $shoppingCart -> getMemberCartItem($member_id);
                if(!empty($cartItem)) {
                    $item_total = 0;
                    ?>
                    <table cellpadding = "10" cellspacing="1">
                        <tbody>
                            <tr>
                                <th style="text-align: left;">
                                    <strong> <?php echo $lang['numeProdus'] ?> </strong> 
                                </th>
                                <th style="text-align: left;">
                                    <strong> <?php echo $lang['cod'] ?> </strong>
                                </th>
                                <th style="text-align: left;">
                                    <strong> <?php echo $lang['categorie'] ?> </strong>
                                </th>
                                <th style="text-align: left;">
                                    <strong> <?php echo $lang['descriere'] ?> </strong>
                                </th>
                                <th style="text-align: right;">
                                    <strong> <?php echo $lang['cantitate'] ?> </strong>
                                </th>
                                <th style="text-align: right;">
                                    <strong> <?php echo $lang['pret'] ?> </strong>
                                </th>
                                <th style="text-align: center;">
                                    <strong> <?php echo $lang['actiune'] ?> </strong>
                                </th>
                            </tr>
                            <?php 
                            foreach($cartItem as $item) {
                                ?>
                                <tr>
                                    <td style ="text-align: left; border-bottom: #F0F0F0 1px solid;">
                                        <strong> <?php echo $item["produs_nume"]; ?> </strong>
                                    </td>
                                    <td style ="text-align: left; border-bottom: #F0F0F0 1 px solid;">
                                        <strong> <?php echo $item["produs_cod"]; ?>
                                    </td>
                                    <td style ="text-align: left; border-bottom: #F0F0F0 1px solid;">
                                        <strong> <?php echo $item["produs_categorie"]; ?> </strong>
                                    </td>
                                    <td style="text-align: left; border-bottom: #F0F0F0 1px solid;">
                                        <strong> <?php echo $item["produs_descriere"]; ?> </strong>
                                    </td>
                                    <td style ="text-align: right; border-bottom: #F0F0F0 1px solid;">
                                        <?php echo $item["cos_cantitate"]; ?>
                                    </td>
                                    <td style="text-align: right; border-bottom: #F0F0F0 1px solid;">
                                        <?php echo $item["produs_pret"].$lang['pret']; ?>
                                    </td>
                                    <td style ="text-align: center; border-bottom: #F0F0F0 1px solid;">
                                    <a href="cart.php?action=remove&produs_id=<?php echo $item["cos_id"]; ?>" class="btnRemoveAction">
                                        <img src="icon-delete.png" alt="icon-delete" title="Remove Item" width = "15" height = "15" />
                                    </a>
                                    </td>
                                </tr>
                                <?php 
                                    $item_total += ($item["produs_pret"] * $item["cos_cantitate"]);
                            }
                            ?>
                            <tr>
                                <td colspan="3" align=right>
                                    <strong> Total: </strong>
                                </td>
                                <td align=right>
                                    <?php echo $item_total.$lang['pret']; ?>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                }
                ?>
        </div>
        <div>
            <a href="shop.php"> <?php echo $lang['altProdus'] ?> </a>
        </div>
        <div>
            <a href="logout.php"> <?php echo $lang['abandonareSesiune'] ?> </a>
        </div>
        
        <footer class = "footer">
            <?php echo $lang['despre'] ?> Magazin electronice <br>
            <?php echo $lang['contact'] ?> Email: magazinElectronice@magazin.com <br>
            Copyright &copy 2023 Magazin Electronice <br>
        </footer>
    </body>
</html>