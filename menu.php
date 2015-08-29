<html>

<head>
    <title>IT Департамент</title>
</head>

<body>

    <?php
include 'functions/bd.php';
include 'functions/session.php';


if (empty($_SESSION['user_id'])) {
    
    

?>

        <ul class="nav nav-list">
            <li><a href="index.php">Главная</a></li>
            <li><a href="info.php">Инфо</a></li>
        </ul>


        <?php
    
}

elseif (!empty($_SESSION['user_id']) and ($_SESSION['userRull'] == "full")) {


?>
            <ul class="nav nav-list">
                <li><a href="index.php">Главная</a></li>
                <li><a href="createUser.php">Создать Заявку</a></li>
                <li><a href="arc.php">Обрабоать</a></li>
                <li><a href="functions/exit.php">Выход</a></li>
            </ul>

            <?php
}
else {
    
    ?>
                <ul class="nav nav-list">
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="createUser.php">Создать Заявку</a></li>
                    <li><a href="arc.php">архив</a></li>
                    <li><a href="functions/exit.php">Выход</a></li>
                </ul>

                <?php
    
}
    
    ?>


</body>


</html>