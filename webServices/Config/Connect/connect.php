<?php
class ConnectPayponseDb{

    public $temp = null;

    function __construct($db)
    {
        $dbName=trim(htmlspecialchars($db));
        $db = 'mysql:host=160.153.162.194;dbname='.$dbName.'';
        $user = 'pp_write';
        $pass = 'tJ9MY;3X+#6P#u+64LoTtKV';
        $this->temp = new PDO($db, $user, $pass);
    }

    function __destruct()
    {
       $this->temp=null;
    }
}

?>
