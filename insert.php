
    <?php
    require 'settings.php';
    function prints($value){
        echo '<pre>';
        print_r($value);
        '</pre>';
    }
    function dbCheckError($query){
        $errInfo=$query->errorInfo();
        if($errInfo[0] !== PDO::ERR_NONE){
            echo $errInfo[2];
            exit();
        }
        return true;
    }

    function selectAll($table){
        global $connection;
        $sql='SELECT * FROM ' . $table ;
        $query=$connection->prepare($sql);
        $query->execute();
        dbCheckError($query);

        return $query->fetchAll();
    }
    prints(selectAll('fitnes'))
?>
