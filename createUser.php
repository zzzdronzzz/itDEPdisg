<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <script src="js/check.js"></script>
    <link rel="stylesheet" href="blocks.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
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

        <?php 
if (empty($_SESSION['user_id'])) {
 
    echo "вы не вошли";
    
}

else {
        
    $selectRull = array(
        "1.1" => "<option value='1.1'>КОРФ, Москва</option>",
        "1.2" => "<option value='1.2'>КОРФ, Филиалы</option>",
        "1.3" => "<option value='1.3'>НЕД, Держинский</option>",
        "1.4" => "<option value='1.4'>НЕД, Москва</option>",
        "1.5" => "<option value='1.5'>НЕД, Филиалы</option>"
    );
    
    echo '<div class="content">
<legend>Выберите тип заявки</legend>
        <center><select id="test" name="rull" onchange="drugs()">';
    echo "<option>Не выбрано</option>";
    foreach ($_SESSION['userRull'] as $value) {
        
        foreach ($selectRull as $key => $inc) {
            if ($key == $value) {
                echo $inc;
            }
        }
    }
    if ($_SESSION['userRull'] == "full") {
        
        foreach ($selectRull as $value) {
            echo $value;
        }
    }
       echo '</select>
            </center>' ;
        ?>



            <div id="view">

                <br/>

            </div>

            <?php 
        
}
        
        ?>
    </div>
    <?php
            echo '</div>';
                
                ?>
</body>


</html>