<?php
require_once '../../../Config/Connect/connect.php';
ini_set('display_errors', 1);
class MobilePartnerController extends ConnectPayponseDb{
    /*
     *username ve password ile kullanicinin olup olmadigini kontrol ediyor
     */
        public function loginControl($partnerId,$userName,$password,$deviceId){
            parent::__construct('db_payponse');
            $getPartner=$this->temp->prepare('select db_name from partners where id=:partnerId ');
            $getPartner->bindParam(':partnerId',$partnerId,PDO::PARAM_INT);
            $getPartner->execute();
            $getPartnerName = $getPartner->fetchAll(PDO::FETCH_ASSOC);
            $time=new DateTime();
            $partnerName =$getPartnerName[0]['db_name'];
            if ($partnerName!=null){
                parent::__construct('db_'.$partnerName);
                $hashPassword= hash('sha256',$password);
                $userControl=$this->temp->prepare('select id,user_type_id from partner_users where username=:uname and password=:pass');
                $userControl->bindParam(':uname',$userName,PDO::PARAM_STR);
                $userControl->bindParam(':pass',$hashPassword,PDO::PARAM_STR);
                $userControl->execute();

                $userData=$userControl->fetchAll(PDO::FETCH_ASSOC);
                if($userControl->rowCount()>0){
                    $id = $userData[0]['id'];
                    $userTpeId=$userData[0]['user_type_id'];
                   // echo $id.' '.$userTpeId;
                    $userData= array('isOK'=>1,'userId'=>$id,'user_type_id'=>$userTpeId);
                    echo json_encode($userData);

                }else{
                    $result=array('isOK'=>0,'error_message'=>'Boyle Bir User Bulunmamaktadir.');
                    echo json_encode($result);
                }

            }
            else{
                $result=array('isOK'=>0,'error_message'=>'Partner Numarasini Kontrol Ediniz.');
                echo json_encode($result);
            }


        }

    /*
     * partner_user_details tablosuna kullanici her giris yaptiginda istek atilarak degerler guncellenir
     */
    public function updatePartnerUserDetails($partnerId,$model,$platform,$osVersion,$deviceToken){
        if(empty($partnerId) || empty($model) || empty($platform) ||  empty($osVersion) ||  empty($deviceToken)){
            echo 'bos alan biraktiniz';
            exit;
        }
        parent::__construct('db_payponse');
        $getDbName=$this->temp->prepare('select db_name from partners where id=:id');
        $getDbName->bindParam('id',$partnerId,PDO::PARAM_INT);
        $getDbName->execute();
        $date=new DateTime();
        $dbName=$getDbName->fetchAll(PDO::FETCH_ASSOC);
            parent::__construct('db_'.$dbName[0]['db_name']);
        $updatePartnerUserDetails=$this->temp->prepare('UPDATE partner_user_details SET model=:model,platform=:platform,os_version=:os_version,device_token=:device_token,updated_date=:ud where uid=:uid');
        $updatePartnerUserDetails->bindParam(':model',$model,PDO::PARAM_STR);
        $updatePartnerUserDetails->bindParam(':platform',$platform,PDO::PARAM_STR);
        $updatePartnerUserDetails->bindParam(':os_version',$osVersion,PDO::PARAM_STR);
        $updatePartnerUserDetails->bindParam(':device_token',$deviceToken,PDO::PARAM_STR);
        $updatePartnerUserDetails->bindParam(':ud',$date->getTimestamp(),PDO::PARAM_INT);
        $updatePartnerUserDetails->bindParam(':uid',$partnerId,PDO::PARAM_INT);
        $updatePartnerUserDetails->execute();
    }
/*
 * @param partnerId verilen partnerin db ismini return eder
 */
    protected function getDbName($partnerId){
        parent::__construct('db_payponse');
        $getDbName=$this->temp->prepare('select db_name from partners where id=:id');
        $getDbName->bindParam('id',$partnerId,PDO::PARAM_INT);
        $getDbName->execute();
        $dbName=$getDbName->fetchAll(PDO::FETCH_ASSOC);
        return $dbName[0]['db_name'];
    }
/*
 * Kullanici her girdiginde istek atilarak device_id update edilecek
 */
    public function updateDeviceId($partnerId,$deviceId){
        $dbName=$this->getDbName($partnerId);
        parent::__construct('db_'.$dbName);
        $updateDeviceId=$this->temp->prepare('UPDATE partner_users SET device_id=:device_id where pid=:uid');
        $updateDeviceId->bindParam(':uid',$partnerId,PDO::PARAM_INT);
        $updateDeviceId->bindParam(':device_id',$deviceId,PDO::PARAM_STR);
        $updateDeviceId->execute();
    }

    }
?>