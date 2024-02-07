
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
        // print($sql);
        // exit();
        $query = $connection->prepare($sql);
        $query->execute();
        dbCheckError($query);

    }
   
    function update($table,$id,$parram){
        global $connection;
        $i=0;
        $str='';

        foreach($parram as $key => $value){
            if($i===0){
                // UPDATE $table SET key='value' , key='value'  WHERE $id=1
                $str=$str . $key. " = " . "'" . " $value " . "'" ;
                
            }else{
                $str=$str . " , " .$key. " = " . "'" . " $value " . "'" ;
            }
            $i++;
        }
        $sql="UPDATE $table SET $str  WHERE  id_user = $id ";
        // prints($sql);
        exit();
        $query = $connection->prepare($sql);
        $query->execute();
        dbCheckError($query);
    }
    function delete($table,$id){
        global $connection;
        $i=0;
        $str='';

        
        $sql="DELETE FROM $table WHERE id_user=$id ";
        prints($sql);
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
    // delete('fitnes', 4);
    // update('fitnes', 2 ,$arrData);
    // insert('fitnes',$arrData);
    // prints(selectAll('data_registration'))


    ?>
