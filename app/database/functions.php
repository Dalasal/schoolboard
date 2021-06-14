<?php

require 'connect.php';

function getData($value) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

function checkError($query) {
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit(); 
    }
    return true;
}

function selectAll($table, $params = []) {
    global $connection;
    $sql = "SELECT * FROM $table";
    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if($i === 0) {
                $sql = $sql . " WHERE $key = $value";
            }else {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }

    $query = $connection->prepare($sql);
    $query->execute();

    checkError($query);

    return $query->fetchAll();
}

function getOneData($table, $params = []) {
    global $connection;
    $sql = "SELECT * FROM $table";
    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if($i === 0) {
                $sql = $sql . " WHERE $key = $value";
            }else {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    // $sql = $sql . " LIMIT 1";

    $query = $connection->prepare($sql);
    $query->execute();

    checkError($query);

    return $query->fetch();
}
$arrdata = [
    'username' => 'ewfwef',
    'email' => 'wefwe@efwe',
];

getOneData('users', $arrdata);

function insertData($table, $params) {
    global $connection;
    // $sql = "INSERT INTO $table (admin, username, email, password) VALUES (:adm, :user, :mail, :pass)";
    $coll = '';
    $mask = '';
    $i = 0;
    foreach ($params as $key => $value) {
        if ($i == 0) {
            $coll = $coll . $key;
            $mask = $mask . "'" . $value . "'";
        }else {
            $coll = $coll . ', ' .$key;
            $mask = $mask . ', ' . "'" .$value . "'";
        }

        $i++;
    };
    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
    // return $connection->lastInsertId();
    $query = $connection->prepare($sql);
    $query->execute($params);
    checkError($query);
    
    // return $connection->lastInsertId();
}


function updateData($table, $params, $id) {
    global $connection;
    // $sql = "UPDATE `users` SET admin = '1' WHERE id = '12'";
    $str = '';
    $i = 0;
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $str = $str . $key . ' = ' . "'" . $value . "'";
        }else {
            $str = $str . ", " . $key . ' = ' . "'" . $value . "'";
        }

        $i++;
    };
    $sql = "UPDATE $table SET $str WHERE current_ip = $id";

    // getData($sql);
    // exit();

    $query = $connection->prepare($sql);
    $query->execute($params);
    checkError($query);
}

function deleteData($table, $id) {
    global $connection;
    $sql = "DELETE FROM $table WHERE current_ip = $id";

    // getData($sql);
    // exit();

    $query = $connection->prepare($sql);
    $query->execute();
    checkError($query);
}

function timerLogin() {
    $blockTime = time();
    $unblockTime = $blockTime + 30;
    echo $blockTime . '<br />' . $unblockTime;
}