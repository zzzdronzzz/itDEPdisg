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

                <h3>IT Депортамент</h3>

            </center>
            <?php
include 'functions/bd.php';     
include 'menu.php';
?>

        </div>

        <div class="content">

            <?php
$id = $_GET['id'];
if (empty($_SESSION['user_id'])) {
    echo "lol";
}
else {

?>
                <legend>Первичная информация</legend>
                <center>
                    <div class="tableOBR">
                        <table class="table table-striped">
                            <?php
$sql = "SELECT * FROM `users` WHERE id = '$id'";
$result =  mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$mustHave = "SELECT * FROM `musthave` WHERE `id_user` = '$id'";
$userHave = mysqli_query($conn,$mustHave);
$have = mysqli_fetch_array($userHave);
    echo "
    <tr>
        <td id='names'>Тип заявки</td>
        <td>".$row[13]."</td>
    </tr>
    <tr>
        <td id='names'>ФИО</td>
        <td>".$row[1]." ".$row[2]." ".$row[3]."</td>
    </tr>
    <tr>
        <td id='names'>Мобильный Телефон</td>
        <td>".$row[4]."</td>
    </tr>
    <tr>
        <td id='names'>Рабочий Телефон</td>
        <td>".$row[5]."</td>
    </tr>
    <tr>
        <td id='names'>Отдел</td>
        <td>".$row[7]."</td>
    </tr>
    <tr>
        <td id='names'>Звено</td>
        <td>".$row[6]."</td>
    </tr>
    ";
?>
                        </table>
                    </div>
                </center>

                <?php
}
?>
        </div>

    </div>


</body>

</html>