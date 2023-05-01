<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['lang']))
    $_SESSION['lang'] = "RO";
else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
    if ($_GET['lang'] == "RO")
        $_SESSION['lang'] = "RO";
    else if($_GET['lang'] == "EN")
        $_SESSION['lang'] = "EN";
}
require_once "languages/" . $_SESSION['lang'] . ".php";
?>