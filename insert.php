
    <?php
    require 'settings.php';


// --prints data----
    function prints($value)
    {
        echo '<pre>';
        print_r($value);
        '</pre>';
    }


// ---check error on data--
    function dbCheckError($query)
    {
        $errInfo = $query->errorInfo();
        if ($errInfo[0] !== PDO::ERR_NONE) {
            echo $errInfo[2];
            exit();
        }
        return true;
    }
// --request on database--
    function selectAll($table)
    {
        global $connection;
        $sql = 'SELECT * FROM ' . $table;
        $query = $connection->prepare($sql);
        $query->execute();
        dbCheckError($query);

        return $query->fetchAll();
    }


    // ---insert data---
    function insert($table , $parram){
        global $connection;
        $i=0;
        $coll='';
        $mask='';

        foreach($parram as $key => $value){
            if($i===0){
                $coll=$coll . " $key ";
                $mask=$mask . "'". " $value " . "'";
                
            }else{
                $coll=$coll . "," . " $key ";
                $mask=$mask . ","."'". " $value " . "'";
            }
            $i++;
        }
        $sql="INSERT INTO $table ($coll) VALUES ($mask)";
        print($sql);
        // exit();
        $query = $connection->prepare($sql);
        $query->execute();
        dbCheckError($query);

    }
   
    $arrData=[
        'name'=>'Aibek',
        'surname'=>'Aibek',
        'kg'=>'88',
    ];
    insert('fitnes',$arrData);
    prints(selectAll('fitnes'))


    ?>
