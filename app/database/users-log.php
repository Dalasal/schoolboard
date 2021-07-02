<?php

include "app/database/functions.php";

$Msg = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['login']);
    $password = trim($_POST['password']);

    $checkName = [
        'username' => $username,
    ];

    $usersIP = $_SERVER['REMOTE_ADDR'];
    $userIP = ip2long($usersIP);

    $existLogin = getOneData('users', $checkName);
    $i = 0;
    $data = false;

    $arrayData = [
        'current_ip' => $userIP,
        'cur_numb' => $i,
    ];

    $num = getOneData('count', ['current_ip' => $userIP]);
    $Msg = $num;

    if (!$num) {
        insertData('count', $arrayData);
    }

    if (!$existLogin) {
        $num = getOneData('count', ['current_ip' => $userIP]);
        $Msg = $num['cur_numb'];
        if ($num['cur_numb'] == 0) {
            $i = 1;
            updateData('count', ['cur_numb' => 1], $userIP);
        }
        if ($num['cur_numb'] == 1) {
            $i = 2;
            updateData('count', ['cur_numb' => 2], $userIP);
        }
        if ($num['cur_numb'] == 2) {
            $data = true;
            $Msg =  'Повторно ввести данные можно через 30 секунд';
            deleteData('count', $userIP);
        }
    }

    else if ($username === '' || $password === '') {
        $Msg = 'Не все поля заполнены!';
    }
    else {
        if (password_verify($password, $existLogin['password'])) {
            $Msg = 'Вы успешно авторизированы';
        } else {
            $Msg = 'Пароль введен неправильно';
        }
    }
}

else {
    $Msg = '';
}