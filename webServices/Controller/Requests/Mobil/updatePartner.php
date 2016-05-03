<?php
require_once '../../Partner/Mobil/MobilePartnerController.php';
$partnerId=$_POST['partnerId'];
$model=$_POST['model'];
$platform=$_POST['platform'];
$osVersion=$_POST['osVersion'];
$deviceToken=$_POST['deviceToken'];
$addPartnerUserDetail=new MobilePartnerController('test');
$addPartnerUserDetail->updatePartnerUserDetails(100002,'deneme3','test','test','test');
$addPartnerUserDetail->updateDeviceId(100002,'asd45546');
?>