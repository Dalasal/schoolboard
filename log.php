<?php

include 'app/database/users-log.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>Document</title>
</head>
<body>
    <!-- <section class="parent flex">
        <div class="school__board--back flex">
            <div class="board__black flex">
                <div class="school__board--border flex">
                    <form class="form__board" method="post" action="reg.php">
                        <label>Username<input name="login" type="text" id="username"></label>
                        <label>Password<input name="mail" type="email" id="email"></label>
                        <button type="submit"></button>
                    </form>
                </div>
            </div>
        </div>
    </section> -->

<div class="flex">
    <div class="school__background">
        <div class="flex-col">
            <div class="school__rawlplug"></div>
            <div class="school__blackboard">
                <div class="school__wood">
                    <div class="school__form">
                        <p>Pixels Daily</p>
                        <form method="post" action="log.php">
                            <label>Username<input name="login" type="text"></label>
                            <label>Password<input name="password" type="password"></label>
                            <input type="image" src='dist/img/login_button.png' alt="Submit" />
                            <div class="error"><?php echo $Msg; ?></div>
                        </form>
                    </div>
                    <div class="school__chalk"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>