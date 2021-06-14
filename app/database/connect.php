<?php
    $driver = 'mysql';
    $host = 'localhost';
    $db_name = 'pet-project';
    $user = 'root';
    $pass = 'flexi140';
    $charset = 'utf8';
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];


    try 
    {
        $connection = new PDO(
            "$driver:host=$host;dbname=$db_name;charset=$charset;",
            $user, $pass
        );
    }
    catch (PDOException $e)
    {
        die("Ошибка подключения к БД") ;
    }