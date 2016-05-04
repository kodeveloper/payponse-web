<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$email=$_GET['email'];
$password=$_GET['password'];
$mark=$_GET['mark'];
require_once '../../../Controller/Partner/Web/PartnerController.php';
$addPArtner=new PartnerController();
$addPArtner->addPartner($mark,$email,$password);
?>
