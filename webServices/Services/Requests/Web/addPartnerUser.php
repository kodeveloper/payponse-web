<?php
require_once '../../../Controller/Partner/Web/PartnerController.php';
$pName=$_POST['pName'];
$userName=$_POST['userName'];
$password=$_POST['password'];
$userType=$_POST['userType'];
$addPartnerUser=new PartnerController();
$addPartnerUser->addPartnerUsers($pName,$userName,$password,$userType);
?>
