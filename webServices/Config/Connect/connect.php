<?php
class ConnectPayponseDb{

    public $temp = null;

    function __construct($db)
    {
        $dbName=trim(htmlspecialchars($db));
        $db = 'mysql:host=46.101.105.239;dbname='.$dbName.'';
        $user = 'pp_write';
        $pass = '69LnvGfZDSuqhp4H';
        $this->temp = new PDO($db, $user, $pass);
    }

    function __destruct()
    {
       $this->temp=null;
    }
}

?>
