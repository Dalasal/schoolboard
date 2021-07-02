<?php

include 'app/database/users-log.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>Document</title>
</head>
<body>

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