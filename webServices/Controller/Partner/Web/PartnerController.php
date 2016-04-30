<?php
require_once '../../../Config/Connect/connect.php';
class PartnerController extends ConnectPayponseDb
{
    private $connectDb;
    function __construct()
    {
        parent::__construct('test');
        $this->connectDb=$this->temp;
    }

    public function addPartner($mark,$email,$password,$status=1){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            return  "This email wrong!";
        $allData=$this->temp->prepare('create database db_'.$mark);
        //$allData->bindParam(':ParamDbName',$dbName,PDO::PARAM_STR);
        $allData->execute();
        $sqlQuery=file_get_contents('../../../Data/Query/partner.sql');
        parent::__construct('db_'.$mark);
        $addAllTables=$this->temp->prepare($sqlQuery);
        $addAllTables->execute();
        parent::__construct('db_payponse');
        $time=new DateTime();
        $addPartnerData=$this->temp->prepare('insert into partners  values (null,:ppi,:dn,:email,:password,:cd,:ud,:lld,:status)');
        $addPartnerData->bindParam(':ppi',$time->getTimestamp(),PDO::PARAM_STR);
        $addPartnerData->bindParam(':dn',$mark,PDO::PARAM_STR);
        $addPartnerData->bindParam(':email',$email,PDO::PARAM_STR);
        $addPartnerData->bindParam(':password',$password,PDO::PARAM_STR);
        $addPartnerData->bindParam(':cd',$time->getTimestamp(),PDO::PARAM_INT);
        $addPartnerData->bindParam(':ud',$time->getTimestamp(),PDO::PARAM_INT);
        $addPartnerData->bindParam(':lld',$time->getTimestamp(),PDO::PARAM_INT);
        $addPartnerData->bindParam(':status',$status,PDO::PARAM_INT);
        $addPartnerData->execute();
    }

    public function addPartnerDetail($pName,$markName,$taxNumber,$taxDepartment,$address,$partnerTypeId){
        parent::__construct('db_'.$pName);
        $time=new DateTime();
        $addPartnerData=$this->temp->prepare('insert into partner_details  values (null,:pn,:mn,:tn,:td,:address,:pti,:ud)');
        $addPartnerData->bindParam(':pn',$pName,PDO::PARAM_STR);
        $addPartnerData->bindParam(':mn',$markName,PDO::PARAM_STR);
        $addPartnerData->bindParam(':tn',$taxNumber,PDO::PARAM_STR);
        $addPartnerData->bindParam(':td',$taxDepartment,PDO::PARAM_STR);
        $addPartnerData->bindParam(':address',$address,PDO::PARAM_STR);
        $addPartnerData->bindParam(':pti',$partnerTypeId,PDO::PARAM_INT);
        $addPartnerData->bindParam(':ud',$time->getTimestamp(),PDO::PARAM_INT);
        $addPartnerData->execute();
    }
    public function addPartnerUsers($pName,$partnerId,$userName,$password,$userType){
        parent::__construct('db_'.$pName);
        $time=new DateTime();
        $device_id='device_id';
        $addPartnerUsers=$this->temp->prepare('insert into partner_users VALUES(null,:pid,:un,:pas,:utid,:cd,:ud,:lld,:did,1) ');
        $addPartnerUsers->bindParam(':pid',$partnerId,PDO::PARAM_INT);
        $addPartnerUsers->bindParam(':un',$userName,PDO::PARAM_STR);
        $addPartnerUsers->bindParam(':pas',$password,PDO::PARAM_STR);
        $addPartnerUsers->bindParam(':utid',$userType,PDO::PARAM_INT);
        $addPartnerUsers->bindParam(':cd',$time->getTimestamp(),PDO::PARAM_INT);
        $addPartnerUsers->bindParam(':ud',$time->getTimestamp(),PDO::PARAM_INT);
        $addPartnerUsers->bindParam(':lld',$time->getTimestamp(),PDO::PARAM_INT);
        $addPartnerUsers->bindParam(':did',$device_id,PDO::PARAM_STR);
        $addPartnerUsers->execute();
    }
}
$newPartner=new PartnerController();
//$newPartner->addPartner('koctas','ahmet@gmail.com',3);
$newPartner->addPartnerUsers('koctas',100005,'abdullahkulcu',"12345",1);