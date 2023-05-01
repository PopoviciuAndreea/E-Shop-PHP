<?php
require_once "WebDriver/phpwebdriver/WebDriver.php";

$webdriver = new WebDriver("localhost", "5555");
$webdriver->connect("chrome");                            
$webdriver->get("http://localhost/php/magazinElectronice2/registration.html");
$elementNum = $webdriver->findElementBy(LocatorStrategy::name, "username");
if ($elementNum) {
    $elementNum->sendKeys(array("miruna" ) );
}

$elementPas = $webdriver->findElementBy(LocatorStrategy::name, "password");
if ($elementPas) {
    $elementPas->sendKeys(array("miruna1234" ) );
}

$elementEmail = $webdriver->findElementBy(LocatorStrategy::name, "email");
if ($elementEmail) {
    $elementEmail->sendKeys(array("miruna@gmail.com" ) );
}

$elementStr = $webdriver->findElementBy(LocatorStrategy::name, "client_str");
if ($elementStr) {
    $elementStr->sendKeys(array("Andrei Saguna, nr.20" ) );
}

$elementOras = $webdriver->findElementBy(LocatorStrategy::name, "client_oras");
if ($elementOras) {
    $elementOras->sendKeys(array("Tg. Mures" ) );
}

$elementTara = $webdriver->findElementBy(LocatorStrategy::name, "client_tara");
if ($elementTara) {
    $elementTara->sendKeys(array("Romania" ) );
}

$elementCodPost = $webdriver->findElementBy(LocatorStrategy::name, "client_codpost");
if ($elementCodPost) {
    $elementCodPost->sendKeys(array("525200" ) );
}

$elementNrCard = $webdriver->findElementBy(LocatorStrategy::name, "client_nrcard");
if ($elementNrCard) {
    $elementNrCard->sendKeys(array("1234567812344321" ) );
}

$elementTipCard = $webdriver->findElementBy(LocatorStrategy::name, "client_tipcard");
if ($elementTipCard) {
    $elementTipCard->sendKeys(array("VISA" ) );
}

$elementDataExp = $webdriver->findElementBy(LocatorStrategy::name, "client_dataexp");
if ($elementDataExp) {
    $elementDataExp->sendKeys(array("2023-05-10" ) );
}

$elementNume = $webdriver->findElementBy(LocatorStrategy::name, "client_nume");
if ($elementNume) {
    $elementNume->sendKeys(array("Campan Miruna" ) );
    $elementNum->submit();
}

?>