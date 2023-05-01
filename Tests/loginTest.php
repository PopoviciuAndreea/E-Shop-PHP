<?php
require_once "WebDriver/phpwebdriver/WebDriver.php";

$webdriver = new WebDriver("localhost", "5555");
$webdriver->connect("chrome");                            
$webdriver->get("http://localhost/php/magazinElectronice2/index.html");
$elementNum = $webdriver->findElementBy(LocatorStrategy::name, "username");
if ($elementNum) {
    $elementNum->sendKeys(array("andreea" ) );
}

$elementPas = $webdriver->findElementBy(LocatorStrategy::name, "password");
if ($elementPas) {
    $elementPas->sendKeys(array("andreea1234" ) );
    $elementNum->submit();
}
?>