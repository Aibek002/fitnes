 <?php
    include('app\database\connectDB.php');

    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;

    // require './PHPMailer/src/Exception.php';
    // require './PHPMailer/src/PHPMailer.php';
    // require './PHPMailer/src/SMTP.php';

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
            // exit();
        }
        return true;
    }
    // --request on database--
    function selectOne($table, $params = [])
    {
        global $connection;

        $sql = 'SELECT * FROM ' . $table;
        $where = ''; // Инициализируем строку для условия WHERE

        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "' " . $value . " '";
            }

            // Формируем часть условия WHERE для текущей пары ключ-значение
            $where .= ($where ? ' AND ' : '') . "$key = $value";
        }

        if (!empty($where)) {
            $sql .= ' WHERE ' . $where; // Добавляем условие WHERE к запросу, если оно сформировано
        }

        $query = $connection->prepare($sql);
        $query->execute();
        dbCheckError($query);
        return $query->fetch();
    }

    function selectAll($table, $param = []) {
        global $connection;
        $sql = 'SELECT * FROM ' . $table;
        if (!empty($param)) {
            $sql .= ' WHERE ';
            $params = [];
            foreach ($param as $key => $value) {
                if (!is_numeric($value)) {
                    $value = "'" . $value . "'";
                }
                $params[] = $key . ' = ' . $value;
            }
            $sql .= implode(' AND ', $params);
        }
        $query = $connection->prepare($sql);
        $query->execute();
        dbCheckError($query);
        return $query->fetchAll();
    }
    


    // ---insert data---
    function insert($table, $parram)
    {
        global $connection;
        $i = 0;
        $coll = '';
        $mask = '';

        foreach ($parram as $key => $value) {
            if ($i === 0) {
                $coll = $coll . " $key ";
                $mask = $mask . "'" . " $value " . "'";
            } else {
                $coll = $coll . "," . " $key ";
                $mask = $mask . "," . "'" . " $value " . "'";
            }

            $i++;
        }
        $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
        // print($sql);
        // exit();
        $query = $connection->prepare($sql);
        $query->execute();
        dbCheckError($query);

        $id = $connection->lastInsertId();

        return $id; // Возвращаем ID
    }

    function update($table, $id, $parram)
    {
        global $connection;
        $i = 0;
        $str = '';

        foreach ($parram as $key => $value) {
            if ($i === 0) {
                // UPDATE $table SET key='value' , key='value'  WHERE $id=1
                $str = $str . $key . " = " . "'" . " $value " . "'";
            } else {
                $str = $str . " , " . $key . " = " . "'" . " $value " . "'";
            }
            $i++;
        }
        $sql = "UPDATE $table SET $str  WHERE  id_user = $id ";
        // prints($sql);
        // exit();
        $query = $connection->prepare($sql);
        $query->execute();
        dbCheckError($query);
    }
    function delete($table, $id)
    {
        global $connection;
        $i = 0;
        $str = '';


        $sql = "DELETE FROM $table WHERE id_user=$id ";
        // prints($sql);
        // exit();
        $query = $connection->prepare($sql);
        $query->execute();
        dbCheckError($query);
    }
    // function getCode($code , $name ,  $email)
    // {
    //     $mail = new PHPMailer(true); // Исправлено здесь, добавлен пробел перед `PHPMailer`
    //     $mail->SMTPDebug = 2;
    //     $mail->isSMTP();
    //     $mail->Host = 'smtp.gmail.com';
    //     $mail->SMTPAuth = true;
    //     $mail->Username = 'aibekseitzhan002@gmail.com';
    //     $mail->Password = 'asozyaoflqeljdkf';
    //     $mail->Port = 465;
    //     $mail->SMTPSecure = 'ssl';
    //     $mail->isHTML(true);
    //     $mail->setFrom($email, $name); // setFrom, а не setForm
    //     $mail->addAddress($_POST['email']); // Адрес, куда будет отправлено сообщение
    //     $mail->Subject = "$email subject"; // Здесь вы можете добавить тему письма
    //     $mail->Body = "Your code is: $code"; // Здесь вы можете добавить содержимое письма, включая код
    //     echo 'send';
    //     $mail->send();
    //     echo $_POST['email'];
    // }

    ?>
