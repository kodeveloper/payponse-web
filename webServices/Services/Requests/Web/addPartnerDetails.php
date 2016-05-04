<?php
require_once '../../../Controller/Partner/Web/PartnerController.php';
$pName=$_POST['pName'];
$markName=$_POST['markName'];
$taxNumber=$_POST['taxNumber'];
$taxDepartment=$_POST['taxDepartment'];
$address=$_POST['address'];
$partnerTypeId=$_POST['partnerTypeId'];
$addPartnerDetails=new PartnerController();
$addPartnerDetails->addPartnerDetail($pName,$markName,$taxNumber,$taxDepartment,$address,$partnerTypeId);
?>
