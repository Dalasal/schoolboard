<?php
    require 'config.php';

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