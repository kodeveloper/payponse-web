<?php
require_once '../../../Config/Connect/connect.php';
require_once '../../../Config/check.php';
class PartnerController extends ConnectPayponseDb
{
    private $connectDb;
    function __construct()
    {
        parent::__construct('test');
        $this->connectDb=$this->temp;
    }
/*
 * partners tablosuna verilen parametreler ile partner ekleyip partnere ozel db olusturur.
 */
    public function addPartner($mark,$email,$password,$status=1){
        if(empty($mark) || empty($mark) || empty($mark))
            return 'bos alan biraktiniz';
        $check=new Check();
        if(!$check->checkPassword($password))
            return 'Gecerli sifre girin';
        if(!$check->checkEmail($email))
            return 'geçerli mail girin';
        $payponseId=$check->createPayponseId();
        $allData=$this->temp->prepare('create database db_'.$mark);
        $allData->execute();
        $sqlQuery=file_get_contents('../../../Data/Query/partner.sql');
        parent::__construct('db_'.$mark);
        $addAllTables=$this->temp->prepare($sqlQuery);
        $addAllTables->execute();
        parent::__construct('db_payponse');
        $time=new DateTime();
        $hashPassword= hash('sha256',$password.$payponseId);
        $addPartnerData=$this->temp->prepare('insert into partners  values (null,:ppi,:dn,:email,:password,:cd,:ud,:lld,:status)');
        $addPartnerData->bindParam(':ppi',$payponseId,PDO::PARAM_STR);
        $addPartnerData->bindParam(':dn',$mark,PDO::PARAM_STR);
        $addPartnerData->bindParam(':email',$email,PDO::PARAM_STR);
        $addPartnerData->bindParam(':password',$hashPassword,PDO::PARAM_STR);
        $addPartnerData->bindParam(':cd',$time->getTimestamp(),PDO::PARAM_INT);
        $addPartnerData->bindParam(':ud',$time->getTimestamp(),PDO::PARAM_INT);
        $addPartnerData->bindParam(':lld',$time->getTimestamp(),PDO::PARAM_INT);
        $addPartnerData->bindParam(':status',$status,PDO::PARAM_INT);
        $addPartnerData->execute();
    }

    /*
     *partner_details tablosuna verilen parametreler ile insert islemi yapar
     */

    public function addPartnerDetail($pName,$markName,$taxNumber,$taxDepartment,$address,$partnerTypeId){
        if(empty(trim($pName)) || trim(empty($markName)) || trim(empty($taxNumber)) || trim(empty($taxDepartment)) || trim(empty($address)) || trim(empty($partnerTypeId)))
            echo 'Bos alan biraktiniz';
        parent::__construct('db_'.trim(htmlspecialchars($pName)));
        $time=new DateTime();
        $addPartnerData=$this->temp->prepare('insert into partner_details  values (null,:pn,:mn,:tn,:td,:address,:ud,:pti,:cd)');
        $addPartnerData->bindParam(':pn',$pName,PDO::PARAM_STR);
        $addPartnerData->bindParam(':mn',$markName,PDO::PARAM_STR);
        $addPartnerData->bindParam(':tn',$taxNumber,PDO::PARAM_STR);
        $addPartnerData->bindParam(':td',$taxDepartment,PDO::PARAM_STR);
        $addPartnerData->bindParam(':address',$address,PDO::PARAM_STR);
        $addPartnerData->bindParam(':pti',$partnerTypeId,PDO::PARAM_INT);
        $addPartnerData->bindParam(':ud',$time->getTimestamp(),PDO::PARAM_INT);
        $addPartnerData->bindParam(':cd',$time->getTimestamp(),PDO::PARAM_INT);
        $addPartnerData->execute();
    }
    /*
     * partner_users tablosuna partnerin userını eklemek icin kullanilir verilen parametreler ile bu tabloya insert islemi yapar
     */
    public function addPartnerUsers($pName,$userName,$password,$userType){
        if(empty($pName)  || empty($userName) ||  empty($password) ||  empty($userType))
            echo 'bos alan biraktiniz';
        $check=new Check();
        if(!$check->checkPassword($password))
            echo 'Gecerli sifre girin';
        $hashPassword= hash('sha256',$password);
        $time=new DateTime();
        $device_id='device_id';
        $partnerId=$this->getUserId($pName);
        echo $partnerId;
        parent::__construct('db_'.$pName);
        $addPartnerUsers=$this->temp->prepare('insert into partner_users (pid,username,password,user_type_id,created_date,updated_date,last_login_date,device_id,status) VALUES(:pid,:un,:pas,:utid,:cd,:ud,:lld,:did,1)');
        $addPartnerUsers->bindParam(':pid',$partnerId,PDO::PARAM_INT);
        $addPartnerUsers->bindParam(':un',$userName,PDO::PARAM_STR);
        $addPartnerUsers->bindParam(':pas',$hashPassword,PDO::PARAM_STR);
        $addPartnerUsers->bindParam(':utid',$userType,PDO::PARAM_INT);
        $addPartnerUsers->bindParam(':cd',$time->getTimestamp(),PDO::PARAM_INT);
        $addPartnerUsers->bindParam(':ud',$time->getTimestamp(),PDO::PARAM_INT);
        $addPartnerUsers->bindParam(':lld',$time->getTimestamp(),PDO::PARAM_INT);
        $addPartnerUsers->bindParam(':did',$device_id,PDO::PARAM_STR);
        echo 1;
        $addPartnerUsers->execute();
    }
/*
 * @param pName parametresi ile partners tablosune sorgu atip userId return eder.
 */
    public function getUserId($pName){
        parent::__construct('db_payponse');
        $getUserId=$this->temp->prepare('select id,db_name from partners where db_name=:db_name');
        $getUserId->bindParam(':db_name',$pName,PDO::PARAM_STR);
        $getUserId->execute();
        $data=$getUserId->fetchAll(PDO::FETCH_ASSOC);
        return $data[0]['id'];
    }
/*
 * partner_user_details tablosuna verilen parametreler ile insert islemi yapar
 */
    public function addPartnerUserDetails($email,$name,$surname){
        if(empty($email) || empty($name) || empty($surname))
            return 'bos alan biraktiniz';
        $check=new Check();
        if(!$check->checkEmail($email))
            return 'geçerli mail girin';
        parent::__construct('db_payponse');
        $getUserId=$this->temp->prepare('select id,db_name from partners where email=:email');
        $getUserId->bindParam(':email',$email,PDO::PARAM_STR);
        $getUserId->execute();
        $data=$getUserId->fetchAll(PDO::FETCH_ASSOC);
        $userId=$data[0]['id'];
        $dbName=$data[0]['db_name'];
        parent::__construct('db_'.$dbName);
        $addPartnerUserDetails=$this->temp->prepare('insert into partner_user_details (uid,name,surname) VALUES(:uid,:name,:surname)');
        $addPartnerUserDetails->bindParam(':uid',$userId,PDO::PARAM_INT);
        $addPartnerUserDetails->bindParam(':name',$name,PDO::PARAM_STR);
        $addPartnerUserDetails->bindParam(':surname',$surname,PDO::PARAM_STR);
        $addPartnerUserDetails->execute();
    }

}
