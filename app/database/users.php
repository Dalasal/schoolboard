<?php

    include "app/database/functions.php";

    $errMsg = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['login']);
        $email = trim($_POST['mail']);
        $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);

        $logs = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ];
        $checkMail = [
            'email' => $email,
        ];
        $checkLogin = [
            'username' => $username,
        ];

        $existLogin = getOneData('users', $checkLogin);
        $existMail = getOneData('users', $checkMail);


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errMsg = "E-mail адрес '$email' указан не верно.";
        }

        else if ($username === '' || $email === '' || $password === '') {
            $errMsg = 'Не все поля заполнены!';
        }
        else if ($existLogin){

            $errMsg = "Пользователь с таким логином уже существует";

        }
        else if ($existMail){
            $errMsg = "Пользователь с таким email уже существует";
        }
        else {
            insertData('users', $logs);
        }

    }else {
        echo '';
    }
    // echo $_SERVER['REQUEST_METHOD'];

?>