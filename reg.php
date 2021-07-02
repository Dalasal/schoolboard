<?php
include "app/database/users.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>Document</title>
</head>
<body>

    <section class="all">
        <div class="container"></div>

        <div class="black-board">
            <div class="black-rawl"></div>
        </div>

        <div class="wood-board">
            <div class="school__form reg-style">
                <p>Pixels Daily</p>
                <form method="post" action="reg.php">
                    <label>Username<input name="login" type="text"></label>
                    <label>Email<input name="mail" type="text"></label>
                    <label>Password<input name="password" type="password"></label>
                    <input type="image" src='dist/img/login_button.png' alt="Submit" />
                    <div class="error"><?php echo $Msg; ?></div>
                </form>
            </div>
            <div class="wood-mel"></div>
        </div>
    </section>

</body>
</html>