<?php
require_once '../../../DB/connect.php';
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
        $sqlQuery=file_get_contents('../../../DB/partner.sql');
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
}
$newPartner=new PartnerController();
$newPartner->addPartner('defacto6','ahmet@example.com','123');