<?php
require_once "DBController.php";

class ShoppingCart extends DBController {
    function getAllProduct() {
        $query = "SELECT * FROM produse";

        $productResult = $this->getDBResult($query);
        return $productResult;
    }

    function getMemberCartItem($cos_clientID) {
        $query = "SELECT produse .*, cos.cos_id, cos.cos_cantitate FROM produse, cos WHERE produse.produs_id = cos.cos_produsID AND cos.cos_clientID = ?";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $cos_clientID
            )
        );

        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }

    function getProductByCode($produs_cod) {
        $query = "SELECT * FROM produse WHERE produs_cod=?";

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $produs_cod
            )
        );

        $productResult = $this->getDBResult($query, $params);
        return $productResult;
    }

    function getCartItemByProduct($cos_produsID, $cos_clientID) {
        $query = "SELECT * FROM cos WHERE cos_produsID=? AND cos_clientID=?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $cos_produsID
            ),
            array(
                "param_type" => "i",
                "param_value" => $cos_clientID
            )
        );

        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }

    function addToCart($cos_produsID, $cos_cantitate, $cos_clientID) {
        $query = "INSERT INTO cos(cos_produsID, cos_cantitate, cos_clientID) VALUES (?, ?, ?)";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $cos_produsID
            ),
            array(
                "param_type" => "i",
                "param_value" => $cos_cantitate
            ),
            array(
                "param_type" => "i",
                "param_value" => $cos_clientID
            )
        );

        $this->updateDB($query, $params);
    }

    function updateCartQuantity($cos_cantitate, $cos_id) {
        $query = "UPDATE cos SET cos_cantitate=? WHERE cos_id=?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $cos_cantitate
            ),
            array(
                "param_type" => "i",
                "param_value" => $cos_id
            )
        );

        $this->updateDB($query, $params);
    }

    function deleteCartItem($cos_id)
    {
        $query = "DELETE FROM cos WHERE cos_id = ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $cos_id
            )
        );

        $this->updateDB($query, $params);
    }

    function emptyCart($cos_clientID) {
        $query = "DELETE FROM cos WHERE cos_clientID=?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $cos_clientID
            )
        );

        $this->updateDB($query, $params);
    }
}