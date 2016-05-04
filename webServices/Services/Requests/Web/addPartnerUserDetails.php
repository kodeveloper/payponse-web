<?php
require_once '../../../Controller/Partner/Web/PartnerController.php';
$email=$_POST['email'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$addPartnerUserDetails=new PartnerController();
$addPartnerUserDetails->addPartnerUserDetails($email,$name,$surname);
?>
