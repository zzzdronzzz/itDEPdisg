<html>


<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="mainBlock">
        <div class="menu">
            <center>
                <h3>IT Депортамент</h3></center>

            <?php
    include 'menu.php';
            
?>

        </div>
        <div class="content">
            <?php

if (empty($_SESSION['user_id'])) {
    
    

?>
                <div class="login">
                    <form method="post" action="functions/ldapCon.php">

                        <center>
                            <h3>Вход</h3>
                            <input type="text" name="username" placeholder="Логин">
                            <br/>

                            <input type="password" name="password" placeholder="Пароль">
                            <br/>

                            <br>
                            <input type="submit" value="login" class="btn btn-primary">


                        </center>
                    </form>
                </div>

                <?php
}

else {
    
    ?>
                    <div class="login">

                        <center>
                            <h3>Добро Пожаловать</h3>
                            <?php echo $_SESSION["user_id"] . ' '. $_SESSION['group']; 
                            if (empty($_SESSION['group'])) {
                            echo ' fail';
                            }
                            ?>



                        </center>
                    </div>

                    <?php
}
    ?>
        </div>
    </div>

</body>

</html>