<?php
class ConnectPayponseDb{

    public $temp = null;

    function __construct($db)
    {
        $dbName=trim(htmlspecialchars($db));
        $db = 'mysql:host=localhost;dbname='.$dbName.'';
        $user = 'root';
        $pass = '';
        $this->temp = new PDO($db, $user, $pass);
    }
    
    public function inserter(){
        
    }
    
    function __destruct()
    {
       $this->temp=null;
    }
}

?>