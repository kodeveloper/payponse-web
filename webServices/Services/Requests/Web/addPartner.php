<?php
$email=$_POST['email'];
$password=$_POST['password'];
$mark=$_POST['mark'];
require_once '../../../Controller/Partner/Web/PartnerController.php';
$addPArtner=new PartnerController();
$addPArtner->addPartner($mark,$email,$password);
?>
