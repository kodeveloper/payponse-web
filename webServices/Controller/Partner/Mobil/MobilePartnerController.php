<?php
require_once '../../../Config/Connect/connect.php';
ini_set('display_errors', 1);
class MobilePartnerController extends ConnectPayponseDb{

    //,$userName,$password,$deviceId
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
                $userControl=$this->temp->prepare('select id,user_type_id from partner_users where username=:uname and password=:pass');
                $userControl->bindParam(':uname',$userName,PDO::PARAM_STR);
                $userControl->bindParam(':pass',$password,PDO::PARAM_STR);
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

    }
$new = new MobilePartnerController('test');
$new->loginControl(100006,'abdullahkulu','12345','test');
?>