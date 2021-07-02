<?php

include 'connect.php';

function dd()
{
    echo '<pre>';
    array_map(function ($x) {
        var_dump($x);
    }, func_get_args());
    die;
}

function checkError($query) {
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit(); 
    }
    return true;
}

function getOneData($table, $params = []) {
    global $connection;
    $sql = "SELECT * FROM $table";
    if ($params) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (is_string($value)) {
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

    return $query->fetch();
}

function insertData($table, $params) {
    global $connection;
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
    $query = $connection->prepare($sql);
    $query->execute($params);
    checkError($query);

}


function updateData($table, $params, $id) {
    global $connection;
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

    $query = $connection->prepare($sql);
    $query->execute($params);
    checkError($query);
}

function deleteData($table, $id) {
    global $connection;
    $sql = "DELETE FROM $table WHERE current_ip = $id";

    $query = $connection->prepare($sql);
    $query->execute();
    checkError($query);
}