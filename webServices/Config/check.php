<?php

class Check{
    public function createPayponseId(){
        $date=new DateTime();
        $seed = str_split('abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.'0123456789');
        shuffle($seed);
        $rand = '72976673';
        foreach (array_rand($seed, 4) as $k) $rand .= $seed[$k];
        return $rand.'.'.$date->getTimestamp();
    }

    public function checkPassword($password){
        if($password) {
            $check = '/\S*((?=\S{8,})(?=\S*[A-Z]))\S*/';
            if (!preg_match($check,$password))
                return false;
            else
                return true;
        }
    }

    public function checkEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            return false;
        else
            return true;
    }

    function checkSpecial($string) {
        if (preg_match('^[A-Za-z0-9]+$', $string)) {		echo 'tr var';	} else {		echo 'gecerli';
        }
    }
}

?>